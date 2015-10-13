<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testcontent()
    {
    	$naam = "Mark";

	    return view('pages.testcontent', compact('naam'));
    }

    public function contacts()
    {

	   return view('pages.contacts')->with([
	   		'voornaam' => 'Mark',
    		'achternaam' => 'Rademaker',
    		'nummer' => '0648820165' 
	   ]);


    }
}