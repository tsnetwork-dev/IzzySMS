<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credor extends Model
{
    //
    protected $table = 'credores';
    public $timestamps = false;

    public function campanha()
    {
        return $this->hashMany('App\Campanha','cd_credor');
    }
}
