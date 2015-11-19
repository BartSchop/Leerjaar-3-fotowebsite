<?php

namespace App\Http\Controllers;

use Request;
use App\Form;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index($id)
    {
        if (\Auth::check()) {
            $forms = Form::all();
            $forms = Form::findorfail($id);
            return view('comment.index', compact('forms'));
        } else {  
            return redirect('auth/login');
        }
    }

    public function store(Request $request, $id)
    {
        $user = \Auth::user();
        $input = Request::all();
        $forms = Form::findorfail($id);

        Comment::create([
            'content' => $input['content'],
            'user_id' => $user->id,
            'form_id' => $forms->id,
            ]);
        return redirect(url('/form', $id));
    }

    public function update($id)
    {
        $comments = Comment::findorfail($id);
        return view('comment.update', compact('comments'));
    }

    public function updateComment(Request $request, $id)
    {
        $input = Request::all();
        $comment = Comment::where('id', $id)->update([
            'content' => $input['content'],
            ]);
        $comments = Comment::find($id);
        return redirect(url('/form', $comments->form_id));
    }

    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->delete();
        return redirect('/form');
    }
}
