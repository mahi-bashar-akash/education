<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function media() {
        return $this->hasOne( Media::class, 'id', 'avatar' );
    }

}
