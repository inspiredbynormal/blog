<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.category.index')->with('categories', Category::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|string|max:200|min:3|unique:categories,category_name',
            'category_image' => 'mimes:jpeg,jpg,png|max:1024',
        ]);

        $status = ($request->status == "on") ? 'active' : 'inactive';

        if ($request->hasFile('category_image')) {
            $destination_path = 'public/media/category';
            $image = $request->category_image;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = null;
        }

        $category = new Category();
        $category->category_name = $request->post('category_name');
        $category->category_slug = Str::slug($request->post('category_name'));
        $category->category_image = $image_new_image;
        $category->status = $status;
        $category->save();

        return redirect()->route('admin.category.create')->with('msg', 'Catgeory created successfully');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => "required|string|max:200|min:3|unique:categories,category_name, $category->id",
            'category_image' => 'mimes:jpeg,jpg,png|max:250',
        ]);

        $status = ($request->status == "on") ? 'active' : 'inactive';

        if ($request->hasFile('category_image')) {
            $destination_path = 'public/media/category';
            $image = $request->category_image;
            $image_new_image = time() . mt_rand(111111, 999999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destination_path, $image_new_image);
        } else {
            $image_new_image = $category->category_image;
        }

        $category->update([
            'category_name' => $request->post('category_name'),
            'category_slug' => Str::slug($request->post('category_name')),
            'category_image' => $image_new_image,
            'status' => $status
        ]);


        return redirect()->route('admin.category.index')->with('msg', 'Catgeory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return redirect()->route('admin.category.index')->with('msg', 'Category deleted successfully');
        } else {
            return redirect()->route('admin.category.index')->with('msg', 'Category not found');
        }
    }
}
