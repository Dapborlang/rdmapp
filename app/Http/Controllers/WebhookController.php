<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SwitchStatus;

class WebhookController extends Controller
{
    public function status(Request $request)
    {
    	if($request->token!="xtUvk2$#@")
    	{
    		return "Fail to load Webhook";
    	}
        $Status=SwitchStatus::findOrfail($request->id);

        $client = new \GuzzleHttp\Client();
        $url='http://'.$Status->ipAddress->ip.':'.$Status->port.'/'.$Status->pin.$request->status;              
        $response = $client->request('GET', $url);

        $Status->status=$request->status;
        // $Status->flag='U';
        $Status->save();
        return $response;
    }
}
