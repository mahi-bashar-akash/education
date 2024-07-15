<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAskingQuestion extends Model
{
    use HasFactory;

    public $hidden = [
        'admin_id'
    ];

}
