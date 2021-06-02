<?php

namespace App\models\Payment;


use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
        public function Usd(){
        return $this->hasMany('Usd');
        }

        public function Tr(){
        return $this->hasMany('Tr');
        }
        
        public function Euro(){
        return $this->hasMany('Euro');
        }

        public function Bim(){
        return $this->hasMany('Bim');
        }
}
