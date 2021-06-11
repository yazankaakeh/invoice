<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
     protected $guarded =['id'];

     public function Student()
     {
        return $this->belongsTo('App\models\Student\Student');
     }

     public function Children()
     {
        return $this->belongsTo('App\models\Publics\Children');
     }
}