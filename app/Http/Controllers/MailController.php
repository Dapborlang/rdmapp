<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\SendMail;
use App\IP;

class MailController extends Controller
{
    public function send()
    {
    	$ip=$_SERVER['REMOTE_ADDR'];
    	$ipcheck=IP::select('ip')
    			->where('detail','home')
    			->first();
    	if($ip==$ipcheck)
    	{
    		$Status=SwitchStatus::findOrfail(8);
    		$Status->status='off';
	        $Status->save();
    		Mail::send(new SendMail());
    	}
    	
    }
}
