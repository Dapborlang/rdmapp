<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IP;
use App\SwitchStatus;

class ButtonsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthUser');
    }

    public function index()
    {
    	$status=SwitchStatus::where('i_p_s_id',$_GET['ip_id'])
        ->where('port',$_GET['port'])
    	->get();
    	return view('ui.ui',compact('status'));
    }
}
