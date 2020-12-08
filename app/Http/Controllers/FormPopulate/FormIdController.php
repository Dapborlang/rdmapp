<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FormPopulate;

class FormIdController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    public function getFormId($id)
    {
        $formPopulate=FormPopulate::select('id')
        ->where('header',$id)
        ->first();

        return $formPopulate;
    }
}
