<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class Hoobies extends Model
{
     public function Children()
     {
        return $this->belongsTo('App\models\Publics\Children');
     }
}
