<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class MedicalStatus extends Model
{
     protected $guarded =['id'];

           protected $fillable = ['disease_type', 'disease_name', 'dr_name', 'treat_cost', 'treat_type', 'treat_Duratio', 'date_accept', 'date_end', 'Trans_to_doctor'];

     public function Student()
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
