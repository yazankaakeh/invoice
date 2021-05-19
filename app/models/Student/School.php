<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
     protected $guarded =['id'];

     public function Children()
     {
        return $this->belongsTo('App\models\Publics\Children');
     }
}
