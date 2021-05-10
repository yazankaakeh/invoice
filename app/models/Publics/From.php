<?php

namespace App\models\Publics;


use Illuminate\Database\Eloquent\Model;

class From extends Model
{
        protected $fillable =[
            'family_form',
            'student_form',
            'medical_form'
        ];
  
}
