<?php

namespace App\models\Family;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
     protected $guarded =['id'];
//########################## One To One Relationships Begins #####################################
    public function job()
        {
        return $this->hasOne('App\models\Publics\job');
        }

    public function Address()
    {
        return $this->hasOne('App\models\Publics\Address');
    }
//########################## One To One Relationships Ends ########################################
//########################## One To Many Relationships Begins #####################################

    public function Children()
        {
        return $this->hasMany('App\models\Publics\Children');
        }
    public function Husband_Wife()
    {
       return $this->hasMany('App\models\Publics\HusbandandWife');
    }

    public function Medical()
    {
       return $this->hasMany('App\models\Medical\Medical');
    }

    public function Student()
    {
       return $this->hasMany('App\models\Student\Student');
    }
    public function StudentPaymnet(){
    return $this->hasMany('App\models\Payment\Student_Payment');
    }
//########################## One To Many Relationships Ends #####################################
}
