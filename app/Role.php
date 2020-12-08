<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public function link()
    {
       return $this->hasMany('App\FormPopulate','role','role')->orderBy('id');
    }

    public function RoleName()
    {
       return $this->belongsTo('App\RoleName','role','role');
    }

    public function User()
    {
       return $this->belongsTo('App\User','user_id');
    }
}

/*
    Created by RDMarwein
*/