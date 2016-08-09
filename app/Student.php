<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function asUser()
    {
        return $this->belongsTo('App\User');
    }
}
