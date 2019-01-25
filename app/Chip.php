<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chip extends Model
{

    public function chipeira()
    {
        return $this->belongsTo('App\Chipeira','chipeira_id');
    }

}


