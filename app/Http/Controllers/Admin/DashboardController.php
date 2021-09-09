<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->session()->get('ROLE') == 'admin') {
            $posts = Post::all();
            $comments = Comment::all();
        } else {
            $posts = Post::where('user_id', $request->session()->get('EDITOR_ID'))->get();
            $comments = Comment::where('user_id', $request->session()->get('EDITOR_ID'))->get();
        }



        $users = User::all();
        $categories = Category::all();

        return view('admin.dashboard.index', compact(['posts', 'comments', 'users', 'categories']));
    }
}
