<?php

namespace App\models\Student;
use App\models\Payment\Student_Payment;
use App\models\Payment\Usd;
use App\models\Payment\Bim;
use App\models\Payment\Tr;
use App\models\Payment\Euro;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded =['id'];

            protected $fillable =[
            'student_name',
            'university',
            'email',
            'address',
            'spec',
            'birthday'
        ];
//########################## One To Many Relationships Begins #####################################
        public function Children()
        {
        return $this->hasMany('App\models\Publics\Children');
        }

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

        public function Husband_Wife()
        {
            return $this->hasMany('App\models\Publics\HusbandandWife');
        }

        public function University()
        {
            return $this->hasMany('App\models\Student\University');
        }

        public function Sister_Brothers()
        {
            return $this->hasMany('App\models\Publics\SisterandBrother');
        }
        public function Scholarships()
        {
            return $this->hasMany('App\models\Student\Scholarship');
        }
//########################## One To Many Relationships Ends #####################################

//########################## One To One Relationships Begins #####################################
        public function job()
        {
        return $this->hasOne('App\models\Publics\job');
        }

        public function medical()
        {
        return $this->hasOne('App\models\Medical\Medical');
        }

        public function Quran()
        {
        return $this->hasOne('App\models\Student\Quran');
        }

        public function MedicalStatus()
        {
        return $this->hasOne('App\models\Publics\MedicalStatus');
        }

        public function Student_Residence()
        {
        return $this->hasOne('App\models\Student\Student_Residence');
        }
        public function Father_Mother()
        {
        return $this->hasOne('App\models\Publics\FatherandMother');
        }

//########################## One To One Relationships Ends #####################################
    public function Family()
    {
        return $this->belongsTo('App\models\Family\Family');
    }


}
