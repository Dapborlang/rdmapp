<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ButtonsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthUser');
    }

    public function index()
    {
    	return view('ui.ui');
    }
}
