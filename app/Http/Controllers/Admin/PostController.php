<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->session()->get('ROLE') == 'admin') {
            $posts = Post::orderBy('id', 'DESC')->get();
        } else {
            $posts = Post::where('user_id', $request->session()->get('EDITOR_ID'))->orderBy('id', 'DESC')->get();
        }
        $categories = Category::where(['status' => 'active'])->get();
        return view('admin.post.index', compact(['posts', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(['status' => 'active'])->get();
        return view('admin.post.create', compact(['categories']));
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
            'post_title' => 'required|string|max:200|min:3|unique:posts,post_title',
            'post_desc' => 'required|string|max:15000|min:100',
            'post_short_desc' => 'required|string|max:600|min:10',
            'post_image' => 'mimes:jpeg,jpg,png|max:1024',
            'post_category' => 'required',
        ]);

        $status = ($request->status == "on") ? 'publish' : 'pending';

        if ($request->hasFile('post_image')) {
            $destination_path = 'public/media/post';
            $image = $request->post_image;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = null;
        }

        $login_id = (session('ROLE') == 'admin') ?  session('ADMIN_ID') : session('EDITOR_ID');

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_slug = Str::slug($request->post_title);
        $post->post_desc = $request->post_desc;
        $post->post_short_desc = $request->post_short_desc;
        $post->post_image = $image_new_image;
        $post->category_id = $request->post_category;
        $post->user_id = $login_id;
        $post->status = $status;
        $post->save();
        return redirect()->route('admin.post.index')->with('msg', 'Post created successfully');
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
    public function edit(Post $post)
    {

        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $post->user_id) {
            return redirect()->route('admin.dashboard');
        }

        $categories = Category::where(['status' => 'active'])->get();
        return view('admin.post.edit', compact(['categories', 'post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $post->user_id) {
            return redirect()->route('admin.dashboard');
        }

        $request->validate([
            'post_title' => "required|string|max:200|min:3|unique:posts,post_title, $post->id",
            'post_desc' => 'required|string|max:15000|min:100',
            'post_short_desc' => 'required|string|max:600|min:10',
            'post_image' => 'mimes:jpeg,jpg,png|max:1024',
            'post_category' => 'required',
        ]);

        $status = ($request->status == "on") ? 'publish' : 'pending';

        if ($request->hasFile('post_image')) {
            $destination_path = 'public/media/post';
            $image = $request->post_image;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = $post->post_image;
        }

        $post->update([
            'post_title' => $request->post_title,
            'post_slug' => Str::slug($request->post_title),
            'post_desc' => $request->post_desc,
            'post_short_desc' => $request->post_short_desc,
            'post_image' => $image_new_image,
            'category_id' => $request->post_category,
            'status' => $status,
        ]);

        return redirect()->route('admin.post.index')->with('msg', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $post->user_id) {
            return redirect()->route('admin.dashboard');
        }

        if ($post) {
            $post->delete();
            return redirect()->route('admin.post.index')->with('msg', 'Post deleted successfully');
        } else {
            return redirect()->route('admin.post.index')->with('msg', 'Post not found');
        }
    }
}
