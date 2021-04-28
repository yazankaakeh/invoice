<?php

namespace App\models\Publics;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $guarded =['id'];
        #################################### One to One Relationships Begin ######################################
        public function student()
        {
        return $this->belongsTo('App\models\Student\Student');
        }


        public function family()
        {
        return $this->belongsTo('App\models\Family\Family');
        }


        public function medical()
        {
        return $this->belongsTo('App\models\Medical\Medical');
        }


        public function HusbandandWife()
        {
        return $this->belongsTo('App\models\Publics\HusbandandWife');
        }


        public function SisterandBrother()
        {
        return $this->belongsTo('App\models\Publics\SisterandBrother');
        }

        public function FatherandMother()
        {
        return $this->belongsTo('App\models\Publics\FatherandMother');
        }

        #################################### One to One Relationships End ######################################

}
