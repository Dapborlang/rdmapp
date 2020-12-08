<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPopulate extends Model
{
    public function index()
    {
       return $this->hasOne('App\FormPopulateIndex');
    }

    public function Role()
    {
       return $this->belongsTo('App\Role','role','role');
    }
}

/*
    Created by RDMarwein
*/