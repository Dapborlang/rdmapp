<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Http\Request;
use App\IP;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("routines");
        $table=Routine::all();
        $card_header='Routine';
        $route='routine';
        return view('autoroute.index', compact('columns','table','card_header','route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("routines");
        $i_p_s_id=IP::all();
        $postData='routine';
        $card_header='Routine';
        $select = array('i_p_s_id'=>$i_p_s_id);
        return view('autoroute.create', compact('columns','postData','card_header','select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Routine::create($request->all());
        return redirect()->back()->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show(Routine $routine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("routines");
        $table=Routine::findOrFail($id);
        $route='routine';
        $card_header='Routine';
        return view('autoroute.edit', compact('columns','table','route','card_header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=Routine::findOrFail($id);
        $update->fill($request->all())->save();
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routine $routine)
    {
        //
    }
}
