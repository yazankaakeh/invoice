<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $guarded =['id'];
     public function Family()
     {
       return $this->belongsTo('App\models\Family\Family');
     }

     public function Medical()
     {
       return $this->belongsTo('App\models\Medical\Medical');
     }
}
