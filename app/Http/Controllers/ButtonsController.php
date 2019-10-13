<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IP;

class ButtonsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthUser');
    }

    public function index()
    {
    	$Address=IP::where('detail','home')
    	->first();
    	$ip= $Address->ip;
    	return view('ui.ui',compact('ip'));
    }
}
