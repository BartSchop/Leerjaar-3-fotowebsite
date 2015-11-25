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
            $forms = Form::orderBy('created_at', 'DESC')->get();
            $users = User::all();
            $sort = 'new';

            return view('welcome', compact('forms', 'users', 'sort'));
    }

    public function sort()
    {
            $input = Request::all();
            if ($input['sort'] == 'old') {
                $forms = Form::orderBy('created_at', 'ASC')->get();
                $users = User::all();   
            } else {
                $forms = Form::orderBy('created_at', 'DESC')->get();
                $users = User::all();   
            }

            $sort = $input['sort'];

            return view('welcome', compact('forms', 'users', 'sort'));
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
        $imageName = $input['content'] . '.' . $input['content']->getClientOriginalExtension();
        $input['content']->move(
            base_path() . '/public/images/', $imageName
        );

        Form::create([
            'title' => $input['title'],
            'content' => str_replace("/tmp/","",$imageName),
            'description' =>$input['description'],
            'tag' => $input['tag'],
            'user_id' => $user->id,
            ]);        
        return redirect('/form');
    }

    public function show($id)
    {
            $forms = Form::findorfail($id);
            $comments = Comment::all();
            $users = User::all();
            $user = \Auth::user();
            $likes = Like::all();

            $likedata=$this->countLikes($likes, $forms);
            $likesamount=$likedata['likesamount'];
            $likesis=$likedata['likesis'];

            return view('form.show', compact('comments', 'likesis', 'likesamount', 'user', 'forms'));
    }

    public function edit($id)
    {
        if (\Auth::check()) {
            return view('form.edit', compact('forms'));
        } else {
            return redirect('auth/login');
        }
    }

    public function update($id)
    {
        $forms = Form::findorfail($id);
        return view('form.update', compact('forms'));
    }

    public function updateForm(Request $request, $id)
    {
        $forms = Form::findorfail($id);
        $input = Request::all();
        $form = Form::where('id', $id)->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'tag' => $input['tag'],
            ]);
        return redirect(url('/form', $forms->id));
    }

    public function destroy($id)
    {
        $comment = Comment::where('form_id', $id)->delete();
        $form = Form::where('id', $id)->delete();
        return redirect('/form');
    }
    public function destroyConfirm($id)
    {
        $form = Form::where('id', $id)->first();
        return view('form.confirm', compact('form'));
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
            }
            if ($forms->id == $like->form_id) {
                $likesamount = $likesamount + 1;
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

    public function search(Request $request)
    {
        $input = Request::all();
        $users = User::all();
        $forms = Form::where('tag', $input['tag'])->get();
        return view('welcome', compact('forms', 'users'));
    }
}
