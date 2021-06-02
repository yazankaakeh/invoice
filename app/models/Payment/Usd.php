<?php


namespace App\models\Payment;

use Illuminate\Database\Eloquent\Model;

class Usd extends Model
{
    protected $guarded =['id'];

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

    public function Income()
    {
        return $this->belongsTo('App\models\Payments\Income');
    }
}
