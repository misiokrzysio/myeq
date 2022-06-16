<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    public function follower(){
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function watched(){
        return $this->belongsTo(User::class, 'watched_id');
    }

}
