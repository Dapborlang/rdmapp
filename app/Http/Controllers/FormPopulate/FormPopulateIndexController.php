<?php
/*
    Created by RDMarwein
*/
namespace App\Http\Controllers;

use App\FormPopulateIndex;
use Illuminate\Http\Request;
use App\FormPopulate;

class FormPopulateIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $data="ADM";
        $this->middleware('auth');
        $this->middleware('formAuth:'.$data);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $excluded=json_encode(explode(',', $request->exclude));
        $notes=json_encode(explode('/', $request->notes));
        $cnotes=json_encode(explode('/', $request->cnotes));

        $formPopulate=new FormPopulateIndex();
        $formPopulate->form_populate_id =   $request->form_populate_id;
        $formPopulate->exclude          =   $excluded;
        $formPopulate->notes            =   $notes;
        $formPopulate->script           =   $request->script;
        $formPopulate->class            =   $request->class;
        $formPopulate->master_keys      =   $request->master_keys;
        $formPopulate->foreign_keys     =   $request->foreign_keys;
        $formPopulate->attribute        =   $request->attribute;
        $formPopulate->type             =   $request->type;
        $formPopulate->cnotes           =   $cnotes;
        $formPopulate->save();

        return redirect()->back()->with('message', 'Form Added');
    }

    public function show($id)
    {
        $form=FormPopulate::findOrFail($id);
        return view('formpopulate.detail',compact('form'));
    }

    public function edit($id)
    {

    }

     public function update(Request $request,  $id)
    {
        $formPopulate=FormPopulateIndex::findOrFail($id);
        $formPopulate->exclude          =   $request->exclude;
        $formPopulate->notes            =   $request->notes;
        $formPopulate->script           =   $request->script;
        $formPopulate->class            =   $request->class;
        $formPopulate->master_keys      =   $request->master_keys;
        $formPopulate->foreign_keys     =   $request->foreign_keys;
        $formPopulate->attribute        =   $request->attribute;
        $formPopulate->type             =   $request->type;
        $formPopulate->cnotes           =   $request->cnotes;
        $formPopulate->save();
        return redirect()->back();
    }

    public function destroy(FormPopulateIndex $formPopulateIndex)
    {
        //
    }
}
