<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function equipments(){
      return $this->hasMany(Equipment::class);
    }

    public function ratings(){
      return $this->hasMany(Rating::class);
    }

    public function reviews(){
      return $this->hasMany(Review::class);
    }
}
