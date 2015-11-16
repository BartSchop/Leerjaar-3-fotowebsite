<?php

namespace App\Http\Controllers;

use App\Form;
use App\Comment;
use App\Like;
use App\User;
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
            $user = \Auth::user();

            return view('form.index', compact('forms', 'user'));
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
            $users = User::all();
            $user = \Auth::user();
            $likes = Like::all();

            foreach ($users as $formuser) {
                if ($forms->user_id == $formuser->id) {
                    $username = $formuser->name;
                    $userlastname = $formuser->lastname;
                    $userid = $formuser->id;
                }
            }
            $likedata=$this->countLikes($likes, $forms);
            $likesamount=$likedata['likesamount'];
            $likesis=$likedata['likesis'];
            return view('form.show', compact('forms'), compact('comments', 'likesis', 'likesamount', 'user', 'username', 'userlastname', 'userid') );
        } else {  
            return redirect('auth/login');
        }
    }

    public function edit($id)
    {
        if (\Auth::check()) {
            return view('form.edit', compact('forms'));
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

    public function like(Request $request, $id)
    {
        if (\Auth::check()) {
            $forms = Form::findorfail($id);
            $userid = \Auth::user();
            Like::create([
                'user_id' => $userid->id,
                'form_id' => $forms->id,
                ]);

            $likes = Like::all();
            $likedata=$this->countLikes($likes, $forms);
            echo json_encode($likedata);
            //return redirect( url('/form', $forms->id ) );
            
        } else {  
            return redirect('auth/login');
        }
       
    }
    private function countLikes($likes, $forms){
        $likesis = 0;
        $likesamount = 0;
        foreach ($likes as $like) {
            if ($forms->id == $like->form_id and \Auth::user()->id == $like->user_id) {
                $likesis = 1;
            } else {
            }
            if ($forms->id == $like->form_id) {
                $likesamount = $likesamount + 1;
            } else{
            }
        }
        return array("likesamount"=>$likesamount,"likesis"=>$likesis);
    }

    public function random()
    {
        if (\Auth::check()) {
            $form = Form::all();
            $first = $form->first();
            $last = $form->last();

            do {
              $id = mt_rand($first->id, $last->id);
              $forms = Form::find($id);
            } while (!$forms);
        
            

            $comments = Comment::all();
            $users = User::all();
            $user = \Auth::user();
            $likes = Like::all();

            foreach ($users as $formuser) {
                if ($forms->user_id == $formuser->id) {
                    $username = $formuser->name;
                    $userlastname = $formuser->lastname;
                    $userid = $formuser->id;
                }
            }
            $likedata=$this->countLikes($likes, $forms);
            $likesamount=$likedata['likesamount'];
            $likesis=$likedata['likesis'];
            return view('form.show', compact('forms'), compact('comments', 'likesis', 'likesamount', 'user', 'username', 'userlastname', 'userid') );
        } else {  
            return redirect('auth/login');
        }
    }


}
