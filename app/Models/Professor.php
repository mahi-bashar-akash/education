<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    public function department_info(){
        return  $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function media() {
        return $this->hasOne( Media::class, 'id', 'avatar' );
    }

    public $hidden = [
        'admin_id'
    ];

}
