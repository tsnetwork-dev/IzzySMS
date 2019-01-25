<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $timestamps = false;

    public function campanha()
    {
        return $this->hashMany('App\Campanha','campanha_id');
    }

}
