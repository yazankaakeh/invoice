<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class FatherandMother extends Model
{
     protected $guarded =['id'];

     public function job()
     {
       return $this->hasOne('App\models\Publics\job');
     }
    public function Student()
    {
       return $this->belongsTo('App\models\Student\Student');
    }
    public function Medical()
    {
       return $this->belongsTo('App\models\Medical\Medical');
    }
}
