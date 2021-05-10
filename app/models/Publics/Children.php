<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
     protected $guarded =['id'];

     public function MedicalStatus()
        {
        return $this->hasOne('App\models\Publics\MedicalStatus');
        }

     public function School()
        {
        return $this->hasOne('App\models\Publics\School');
        }
        
     public function Student()
    {
        return $this->belongsTo('App\models\Student\Student');
    }

     public function Family()
    {
        return $this->belongsTo('App\models\Family\Family', "family_id");
    }

     public function Medical()
    {
        return $this->belongsTo('App\models\Medical\Medical');
    }
}
