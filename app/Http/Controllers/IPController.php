<?php

namespace App\Http\Controllers;

use App\IP;
use Illuminate\Http\Request;
use App\Routine;
use App\SwitchStatus;

class IPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $server=$_GET['server'];
        $url=$_SERVER['REMOTE_ADDR'];

        $updateUrl=IP::updateOrCreate(
            ['detail' => $server],
            ['ip' => $url]
        );


        $status=SwitchStatus::where('flag','U')
        ->get();
        foreach ($status as $item) 
        {
            $url='http://'.$item->ipAddress->ip.':'.$item->port.'/'.$item->pin.$item->status;                
            $response = $client->request('GET', $url);
            $swithStat= SwitchStatus::findOrfail($item->id);
            $swithStat->flag = "C";
            $swithStat->save();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function show(IP $iP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function edit(IP $iP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IP $iP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function destroy(IP $iP)
    {
        //
    }

    public function setStatus(Request $request)
    {
        $Status=SwitchStatus::findOrfail($request->id);
        
        $client = new \GuzzleHttp\Client();
        $url='http://'.$Status->ipAddress->ip.':'.$Status->port.'/'.$Status->pin.$Status->status;               
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
                $url='http://'.$item->ipAddress->ip.':'.$item->port.'/'.$item->uri;   ;             
                $response = $client->request('GET', $url);
            }
        }
    }
}
