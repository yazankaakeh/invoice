<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class HusbandandWife extends Model
{
     protected $guarded =['id'];

    public function job()
     {
       return $this->hasOne('App\models\Publics\job');
     }

    public function University()
     {
       return $this->hasMany('App\models\Student\University');
     }

     public function MedicalStatus()
        {
        return $this->hasOne('App\models\Publics\MedicalStatus');
        }

    public function Student()
        {
        return $this->belongsTo('App\models\Student\Student');
        }
    public function Medical()
        {
        return $this->belongsTo('App\models\Medical\Medical');
        }
    public function Family()
        {
        return $this->belongsTo('App\models\Family\Family');
        }
}
