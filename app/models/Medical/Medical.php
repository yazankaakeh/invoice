<?php

namespace App\models\Medical;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
     protected $guarded =['id'];
//########################## One To One Relationships Begins #####################################
     public function job()
     {
       return $this->hasOne('App\models\Publics\job');
     }

     public function Father_Mother()
     {
       return $this->hasOne('App\models\Publics\FatherandMother');
     }

    public function Address()
    {
        return $this->hasOne('App\models\Publics\Address');
    }
//########################## One To One Relationships Ends ########################################


//########################## One To Many Relationships Begins #####################################
    public function Medical_Status()
     {
       return $this->hasMany('App\models\Publics\MedicalStatus');
     }
    public function Husband_Wife()
    {
       return $this->hasMany('App\models\Publics\HusbandandWife');
    }
    public function Children()
    {
        return $this->hasMany('App\models\Publics\Children');
    }
    public function StudentPaymnet()
    {
    return $this->hasMany('App\models\Payment\Student_Payment');
    }
//########################## One To Many Relationships Ends #####################################
    public function Family()
    {
        return $this->belongsTo('App\models\Family\Family');
    }
}
