<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;

    public function student_info(){
        return  $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function fees_type_info(){
        return  $this->hasOne(FeesTypes::class, 'id', 'fees_type_id');
    }

    public function payment_type_info(){
        return  $this->hasOne(PaymentTypes::class, 'id', 'payment_type_id');
    }

    public function payment_status_info(){
        return  $this->hasOne(PaymentStatus::class, 'id', 'payment_status_id');
    }

}
