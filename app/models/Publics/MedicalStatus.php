<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class MedicalStatus extends Model
{
     protected $guarded =['id'];

     public function Student_Medical()
     {
        return $this->belongsTo('App\models\Student\Student');
     }

     public function Children()
     {
        return $this->belongsTo('App\models\Publics\Children');
     }
     public function Husband_Wife_Midical()
     {
        return $this->belongsTo('App\models\Publics\HusbandandWife');
     }

     public function Medical()
     {
        return $this->belongsTo('App\models\Medical\Medical');
     }
}
