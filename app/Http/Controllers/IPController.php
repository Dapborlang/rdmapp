<?php

namespace App\Http\Controllers;

use App\IP;
use Illuminate\Http\Request;
use App\Routine;
use App\SwitchStatus;

class IPController extends Controller
{

    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $server=$_GET['server'];
        $url=$_SERVER['REMOTE_ADDR'];

        $updateUrl=IP::updateOrCreate(
            ['detail' => $server],
            ['ip' => $url]
        );

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(IP $iP)
    {
        //
    }

    public function edit(IP $iP)
    {
        //
    }

    public function update(Request $request, IP $iP)
    {
        //
    }

    public function destroy(IP $iP)
    {
        //
    }

    public function setStatus(Request $request)
    {
        $Status=SwitchStatus::findOrfail($request->id);

        $client = new \GuzzleHttp\Client();
        $url='http://'.$Status->ipAddress->ip.':'.$Status->port.'/'.$Status->pin.$request->status;               
        $response = $client->request('GET', $url);

        $Status->status=$request->status;
        // $Status->flag='U';
        $Status->save();
        return $response;
    }

    public function CronJob()
    {
        $client = new \GuzzleHttp\Client();        
        $routine=Routine::all();
        foreach ($routine as $item) 
        {
            if (time() >= strtotime($item->time.':00') && time() < strtotime($item->time.':57')) {
                $url='http://'.$item->ipAddress->ip.':'.$item->port.'/'.$item->uri;             
                $response = $client->request('GET', $url);
            }
        }
    }
}
