<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class DelayedScholar extends Model
{
    public function Student()
    {
       return $this->belongsTo('App\models\Student\Student');
    }
}