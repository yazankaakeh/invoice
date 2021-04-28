<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class Student_Residence extends Model
{


   protected $guarded =['id'];
   public function Student()
   {
        return $this->belongsTo('App\models\Student\Student');
   }



}
