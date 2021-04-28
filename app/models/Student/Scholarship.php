<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $guarded =['id'];
    public function Student()
    {
       return $this->belongsTo('App\models\Student\Student');
    }
}
