<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SwitchStatus;

class WebhookController extends Controller
{
    public function status(Request $request)
    {
    	if($json = json_decode(file_get_contents("php://input"), true)) {
		     $data = $json;
		 } else {
		     $data = $_POST;
		 }
        if($data['token']!="xtUvk2$#@")
        {
            return "Fail to load Webhook";
        }
        
        $Status=SwitchStatus::findOrfail($data['id']);

        $client = new \GuzzleHttp\Client();
        $url='http://'.$Status->ipAddress->ip.':'.$Status->port.'/'.$Status->pin.$data['status'];              
        $response = $client->request('GET', $url);

        $Status->status=$data['status'];
        // $Status->flag='U';
        $Status->save();
        return $response;
    }
}
