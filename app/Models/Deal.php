<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Deal extends Model
{
    public function location(){
       return $this->belongsTo('App\Models\Location');
    }
}
