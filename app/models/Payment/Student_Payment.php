<?php

namespace App\models\Payment;
use App\models\Student\Student;
use Illuminate\Database\Eloquent\Model;

class Student_Payment extends Model
{
    protected $guarded =['id'];

    protected $fillable =[
            'value',
        ];
    public function Student()
    {
        return $this->belongsTo('App\models\Student\Student');
    }
    public function Family()
    {
        return $this->belongsTo('App\models\Family\Family');
    }
    public function Medical()
    {
        return $this->belongsTo('App\models\Medical\Medical');
    }


}
