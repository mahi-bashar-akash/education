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

}
