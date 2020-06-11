<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function locationtheme(){
       return $this->hasOne('App\Models\LocationTheme');
    }
}
