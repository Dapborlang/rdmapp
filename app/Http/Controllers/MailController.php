<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\mail\sendMail;

class MailController extends Controller
{
    public function send()
    {
    	Mail::send(new sendMail());
    }
}
