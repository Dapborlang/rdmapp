<?php
/*
    Created by RDMarwein
*/
namespace App\Http\Controllers;

use App\FormPopulate;
use Illuminate\Http\Request;
use App\RoleName;

class FormPopulateController extends Controller
{
    public function __construct()
    {
        $data="ADM";
        $this->middleware('auth');
        $this->middleware('formAuth:'.$data);
    }

    public function index()
    {
        $forms=FormPopulate::orderBy('id')->get();
        return view('formpopulate.index',compact('forms'));
    }


    public function create()
    {
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("form_populates");
        $role=RoleName::all();
        $postData='formpopulate';
        $card_header='Form Populate Master';
        $select = array('role'=>$role);
        $key=array('');
        return view('formpopulate.create', compact('columns','postData','card_header','select','key'));
    }

    public function store(Request $request)
    {
        $formPopulate=new FormPopulate();
        $formPopulate->table_name    =   $request->table_name;
        $formPopulate->model        =   $request->model;
        $formPopulate->route        =   $request->route;
        $formPopulate->header       =   $request->header;
        $formPopulate->role         =   $request->role;
        $formPopulate->save();
        return redirect('formpopulateall')->with('message', 'Form Added');

    }

    public function show(FormPopulate $formPopulate)
    {
        //
    }


    public function edit($id)
    {
        $role=RoleName::all();
        $form=FormPopulate::findOrFail($id);
        return view('formpopulate.edit',compact('role','form'));
    }


    public function update(Request $request, $id)
    {
        $formPopulate=FormPopulate::findOrFail($id);
        $formPopulate->table_name    =   $request->table_name;
        $formPopulate->model        =   $request->model;
        $formPopulate->route        =   $request->route;
        $formPopulate->header       =   $request->header;
        $formPopulate->role         =   $request->role;
        $formPopulate->save();
        return redirect()->action('FormPopulateController@index')->with('message', 'Updated Successfully');;
    }


    public function destroy(FormPopulate $formPopulate)
    {
        //
    }

    public function resources()
    {        
        $formPopulate=FormPopulate::all();
        return view('formpopulate.resources',compact('formPopulate'));
    }
}
