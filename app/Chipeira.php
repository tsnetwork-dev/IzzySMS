<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chipeira extends Model
{
    //

    public function chipeira()
    {
        return $this->hashMany('App\Chip','chipeira_id');
    }
}
