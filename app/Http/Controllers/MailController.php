<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function send()
    {
    	Mail::send(new SendMail());
    }
}
