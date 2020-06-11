<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function locationtheme(){
       return  $this->hasOne('App\Models\LocationTheme');
    }

    public function location(){
        return $this->hasOne('App\Models\Deal');
    }
}
