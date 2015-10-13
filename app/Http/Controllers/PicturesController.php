<?php

namespace App\Http\Controllers;

use App\Pictures;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PicturesController extends Controller
{
    public function index()
    {
    	$showpictures = Pictures::all();

    	return view('pictures')->with('pictures', $showpictures);
    }
}
