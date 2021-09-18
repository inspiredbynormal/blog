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

        // $postsGroups = Post::where('status', 'publish')->orderBy('id', 'DESC')->limit(12)->get()->splitIn(4);
        $posts = Post::where('status', 'publish')->orderBy('id', 'DESC')->limit(12)->get();
        // dd($postsGroups);
        $gallery_post = Post::with('category', 'user')->where('status', 'publish')->inRandomOrder()->limit(4)->get();
        $categories = Category::with('posts')->where('status', 'active')->orderBy('id', 'DESC')->get();

        return view('frontend.home', compact(['posts', 'gallery_post', 'categories']));
    }

    public function blog_details(Request $request, Post $post)
    {
        $related_posts = Post::where(['category_id' => $post->category_id, 'status' => 'publish'])->where('id', '!=', $post->id)->orderBy('id', 'DESC')->limit(2)->get();

        $categories = Category::with('posts')->where('status', 'active')->orderBy('id', 'DESC')->limit(4)->get();

        $comments = Comment::where('post_id', $post->id)->where('status', 'active')->orderBy('id', 'DESC')->get();

        return view('frontend.blog-details', compact(['post', 'related_posts', 'categories', 'comments']));
    }

    public function comment_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_msg' => 'required|string|min:3|max:500',
            'post_id' => 'required'
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
        $posts = Post::where(['category_id' => $category->id, 'status' => 'publish'])->Paginate(8);
        return view('frontend.posts-by-category', compact(['posts', 'category']));
    }

    public function post_all()
    {
        $posts = Post::where(['status' => 'publish'])->orderBy('id', 'DESC')->Paginate(8);
        $gallery_post = Post::with('category', 'user')->where('status', 'publish')->inRandomOrder()->limit(4)->get();
        return view('frontend.posts-all', compact(['posts', 'gallery_post']));
    }

    public function search_posts(Request $request)
    {
        $search_term = $request->get('search');
        // $posts = DB::table('posts')->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'categories.category_name', 'categories.category_slug', 'users.name', 'users.avatar')->where('posts.post_title', 'like', "%$search_term%")->orWhere('posts.post_desc', 'like', "%$search_term%")->orWhere('categories.category_name', 'like', "%$search_term%")->get();

        $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.post_title', 'like', "%$search_term%")
            ->orWhere('posts.post_desc', 'like', "%$search_term%")
            ->orWhere('categories.category_name', 'like', "%$search_term%")->get();

        return view('frontend.post-search', compact(['posts', 'search_term']));
    }
}
