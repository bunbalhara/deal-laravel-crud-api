<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationTheme extends Model
{
    public function theme(){
       return $this->belongsTo('App\Models\Theme');
    }

    public function location(){
       return $this->belongsTo('App\Models\Location');
    }
}
