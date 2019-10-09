<?php

namespace App\Http\Controllers;

use App\IP;
use Illuminate\Http\Request;
use App\Routine;

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

        $routine=Routine::where('i_p_s_id',$updateUrl->id)
        ->get();

        foreach ($routine as $item) 
        {
            if (time() >= strtotime($item->time.':00') && time() < strtotime($item->time.':57')) {
                $url='http://'.$url.':'.$item->port.'/'.$item->uri;                
                $response = $client->request('GET', $url);
                echo $response->getBody().'<br>';
            }
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
}
