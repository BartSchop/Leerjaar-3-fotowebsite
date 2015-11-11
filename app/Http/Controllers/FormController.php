<?php

namespace App\Http\Controllers;

use App\Form;
use App\Comment;
use Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            $forms = Form::all();
            return view('form.index', compact('forms'));
        } else {  
            return redirect('auth/login');
        }
    }

    public function create()
    {
        if (\Auth::check()) {
            return view('form.create');
        } else {  
            return redirect('auth/login');
        }
    }

    public function store(Request $request)
    {
        $user = \Auth::user();
        $input = Request::all();

        Form::create([
            'title' => $input['title'],
            'content' => $input['content'],
            'tag' => $input['tag'],
            'user_id' => $user->id,
            ]);
        return redirect('/form');
    }


    public function show($id)
    {
        if (\Auth::check()) {
            $forms = Form::findorfail($id);
            $comments = Comment::all();
            return view('form.show', compact('forms'), compact('comments'));
        } else {  
            return redirect('auth/login');
        }
    }

    public function edit($id)
    {
        if (\Auth::check()) {

            $forms = Form::findorfail($id);
            $formuserid = $forms->user_id;

            $user = \Auth::user();
            $userid = $user->id;

            if ($userid == $formuserid) {
                 return view('form.edit', compact('forms'));
            } else {
                 return Redirect('/form');
            } 
        } else {
            return redirect('auth/login');
        }
    }

    public function update()
    {
        return 'Updating.....';
    }

    public function destroy($id)
    {
        return 'Deleting.....';
    }

}
