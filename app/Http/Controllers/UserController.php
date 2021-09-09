<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index', compact(['users']));
    }

    public function login()
    {
        return view('frontend.user.login');
    }

    public function login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:150',
            'password' => 'required|string|max:64|min:8'
        ]);


        $user_check = User::where(['email' => $request->email, 'role' => 'editor'])->first();

        if ($user_check) {
            if ($user_check->status == 'active') {
                if (Hash::check($request->password, $user_check->password)) {
                    $request->session()->put('LOGIN', true);
                    $request->session()->put('EDITOR_ID', $user_check->id);
                    $request->session()->put('EDITOR_NAME', $user_check->name);
                    $request->session()->put('ROLE', $user_check->role);

                    return redirect()->back()->with('msg', 'Login Successful');
                } else {
                    return redirect()->back()->with(['msg' => 'Wrong Password', 'type' => 'error']);
                }
            } else {
                return redirect()->back()->with(['msg' => 'Your account is now deactive', 'type' => 'error']);
            }
        } else {
            return redirect()->back()->with(['msg' => 'Please register', 'type' => 'error']);
        }
    }

    public function register()
    {
        return view('frontend.user.register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150|min:3',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|max:64|min:8',
            'avatar' => 'mimes:jpeg,jpg,png|max:250'
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->slug = Str::slug($request->name);
        $user->save();

        return redirect()->route('user-login')->with('msg', 'Thank you for your registration');
    }

    public function admin_login()
    {
        return view('admin.user.login');
    }

    public function admin_login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:150',
            'password' => 'required|string|max:64|min:8'
        ]);


        $user_check = User::where(['email' => $request->email, 'role' => 'admin'])->first();

        if ($user_check) {
            if ($user_check->status == 'active') {
                if (Hash::check($request->password, $user_check->password)) {
                    $request->session()->put('LOGIN', true);
                    $request->session()->put('ADMIN_ID', $user_check->id);
                    $request->session()->put('ADMIN_NAME', $user_check->name);
                    $request->session()->put('ROLE', $user_check->role);

                    return redirect()->route('admin.dashboard')->with(['msg' => 'Login Successful', 'type' => 'success']);
                } else {
                    return redirect()->back()->with(['msg' => 'Wrong Password', 'type' => 'error']);
                }
            } else {
                return redirect()->back()->with(['msg' => 'Your account is now deactive', 'type' => 'error']);
            }
        } else {
            return redirect()->back()->with(['msg' => 'You are not an admin', 'type' => 'error']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('front.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150|min:3',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|max:64|min:8',
            'role' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png|max:1024',
            'status' => 'required'
        ]);



        $status = ($request->status == "on") ? 'active' : 'inactive';

        if ($request->hasFile('avatar')) {
            $destination_path = 'public/media/user';
            $image = $request->avatar;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = null;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->slug = Str::slug($request->name);
        $user->role = $request->role;
        $user->avatar = $image_new_image;
        $user->status = $status;

        $user->save();

        return redirect()->route('admin.user.index')->with('msg', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:150|min:3',
            'email' => "required|email|max:150|unique:users,email, $user->id",
            'role' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png|max:1024'
        ]);



        $status = ($request->status == "on") ? 'active' : 'inactive';

        if ($request->hasFile('avatar')) {
            $destination_path = 'public/media/user';
            $image = $request->avatar;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = $user->avatar;
        }

        $pass = ($request->password == "") ? $user->password : Hash::make($request->password);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'slug' => Str::slug($request->name),
            'role' => $request->role,
            'avatar' => $image_new_image,
            'status' => $status
        ]);

        return redirect()->route('admin.user.index')->with('msg', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return redirect()->route('admin.user.index')->with('msg', 'User deleted successfully');
        } else {
            return redirect()->route('admin.user.index')->with('msg', 'User not found');
        }
    }
}
