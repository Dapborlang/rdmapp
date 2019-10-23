<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $guarded = ['id'];

    public function ipAddress()
    {
       return $this->belongsTo('App\IP','i_p_s_id');
    }
    
}
