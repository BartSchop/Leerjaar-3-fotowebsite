<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Form;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('admin.inbox', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function showMessage($id)
    {
        $messages = Message::findorfail($id);
        $users = User::all();
        $forms = Form::all();

        return view('user.message', compact('users', 'messages', 'forms'));
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $input = Request::all();

        $form = User::where('id', $id)->update(['status' => $input['number']]);
        return redirect(url('/admin/user/info', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function report($id)
    {
        $forms = Form::findorfail($id);
        return view('admin.report', compact('forms'));
    }

    public function store(Request $request, $id)
    {
        $user = \Auth::user();
        $form = Form::findorfail($id);
        $input = Request::all();

        Message::create([
            'user_id' => $user['id'],
            'form_id' => $form['id'],
            'content' => $input['content'],
            'type' => $input['type'],
            ]);
        return redirect('/form');
    }
}