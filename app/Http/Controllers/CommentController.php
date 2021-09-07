<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->get('ROLE') == 'admin') {
            $comments = Comment::orderBy('id', 'DESC')->get();
        } else {
            $comments = Comment::where('user_id', $request->session()->get('EDITOR_ID'))->orderBy('id', 'DESC')->get();
        }

        return view('admin.comment.index', compact(['comments']));
    }

    public function edit(Comment $comment)
    {
        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $comment->user_id) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.comment.edit', compact(['comment']));
    }

    public function update(Request $request, Comment $comment)
    {
        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $comment->user_id) {
            return redirect()->route('admin.dashboard');
        }
        $request->validate([
            'comment_msg' => 'required|string|min:3|max:500'
        ]);
        $status = ($request->status == "on") ? 'active' : 'inactive';
        $comment->update([
            'comment_msg' => $request->comment_msg,
            'status' => $status
        ]);

        return redirect()->route('admin.comment.index')->with('msg', 'Comment updated successfully');
    }

    public function destroy(Request $request, Comment $comment)
    {
        if (session('ROLE') == 'editor' && session('EDITOR_ID') != $comment->user_id) {
            return redirect()->route('admin.dashboard');
        }

        if ($comment) {
            $comment->delete();
            return redirect()->route('admin.comment.index')->with('msg', 'Comment deleted successfully');
        } else {
            return redirect()->route('admin.comment.index')->with('msg', 'Comment not found');
        }
    }
}
