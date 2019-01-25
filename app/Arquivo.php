<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    public $timestamps = false;
    public function campanha()
    {
        return $this->belongsTo('App\Credor','campanha_id');
    }
}
