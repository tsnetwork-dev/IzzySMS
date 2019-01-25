<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    //desabilita o timestamp
    public $timestamps = false;

    public function credor()
    {
        return $this->belongsTo('App\Credor','cd_credor');
    }

    public function telefone()
    {
        return $this->belongsTo('App\Telefone','camapanha_id');
    }
}
