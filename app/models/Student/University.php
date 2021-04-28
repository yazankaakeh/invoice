<?php

namespace App\models\Student;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
   protected $guarded =['id'];

    public function HusbandWife()
    {
        return $this->belongsTo('App\models\Publics\HusbandandWife');
    }
    public function Student()
    {
        return $this->belongsTo('App\models\Student\Student');
    }

    public function SisterandBrother()
    {
        return $this->belongsTo('App\models\Publics\SisterandBrother');
    }
}
