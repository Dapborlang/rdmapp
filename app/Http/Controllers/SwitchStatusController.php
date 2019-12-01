<?php

namespace App\Http\Controllers;

use App\SwitchStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IP;

class SwitchStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthUser');
    }

    public function index()
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("switch_statuses");
        $table=SwitchStatus::all();
        $card_header='SwitchStatus';
        $route='switches';
        return view('autoroute.index', compact('columns','table','card_header','route'));
    }


    public function create()
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("switch_statuses");
        $i_p_s_id=IP::all();
        $postData='switches';
        $card_header='Switch';
        $select = array('i_p_s_id'=>$i_p_s_id);
        return view('autoroute.create', compact('columns','postData','card_header','select'));
    }

    public function store(Request $request)
    {
        SwitchStatus::create($request->all());
        return redirect()->back()->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SwitchStatus  $switchStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SwitchStatus $switchStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SwitchStatus  $switchStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("switch_statuses");
        $table=SwitchStatus::findOrFail($id);
        $route='switches';
        $card_header='Switch';
        return view('autoroute.edit', compact('columns','table','route','card_header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SwitchStatus  $switchStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=SwitchStatus::findOrFail($id);
        $update->fill($request->all())->save();
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SwitchStatus  $switchStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SwitchStatus $switchStatus)
    {
        //
    }
}
