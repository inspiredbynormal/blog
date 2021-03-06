<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->where('status', 'publish')->orderBy('id', 'DESC')->limit(8)->get();
        $gallery_post = Post::with('category', 'user')->where('status', 'publish')->inRandomOrder()->limit(4)->get();
        return view('frontend.home', compact(['posts', 'gallery_post']));
    }

    public function blog_details(Request $request, Post $post)
    {
        $related_posts = Post::where(['category_id' => $post->category_id, 'status' => 'publish'])->where('id', '!=', $post->id)->orderBy('id', 'DESC')->limit(2)->get();

        return view('frontend.blog-details', compact(['post', 'related_posts']));
    }

    public function comment_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_msg' => 'required|string|min:3|max:500'
        ]);

        $login_id = ($request->session()->get('ROLE') == 'editor') ? $request->session()->get('EDITOR_ID') : $request->session()->get('ADMIN_ID');

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Your comment could not be recieved']);
        } else {
            $comment = new Comment();
            $comment->comment_msg = $request->comment_msg;
            $comment->post_id = $request->post_id;
            $comment->user_id = $login_id;
            $comment->save();

            return response()->json(['status' => 'success', 'message' => 'Successfully recieved your comment']);
        }
    }

    public function category_all()
    {
        $categories = Category::where('status', 'active')->get();
        return view('frontend.category-all', compact(['categories']));
    }

    public function posts_by_category(Category $category)
    {
        $posts = Post::where(['category_id' => $category->id, 'status' => 'publish'])->get();
        return view('frontend.posts-by-category', compact(['posts']));
    }

    public function post_all()
    {
        $posts = Post::where(['status' => 'publish'])->orderBy('id', 'DESC')->Paginate(8);
        return view('frontend.posts-all', compact(['posts']));
    }

    public function search_posts(Request $request)
    {
        $search_term = $request->get('search');
        $posts = DB::table('posts')->join('categories', 'posts.category_id', '=', 'categories.id')->select('posts.*', 'categories.category_name', 'categories.category_slug')->where('posts.post_title', 'like', "%$search_term%")->orWhere('posts.post_desc', 'like', "%$search_term%")->orWhere('categories.category_name', 'like', "%$search_term%")->get();
        return view('frontend.post-search', compact(['posts']));
    }
}
