<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function professor_info(){
        return  $this->hasOne(Professor::class, 'id', 'professor_id');
    }

    public $hidden = [
        'admin_id'
    ];

}
