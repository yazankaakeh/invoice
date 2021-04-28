<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
     protected $guarded =['id'];

     public function Medical()
     {
        return $this->belongsTo('App\models\Publics\Children');
     }
}
