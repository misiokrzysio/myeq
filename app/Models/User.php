<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function equipments(){
      return $this->hasMany(Equipment::class);
    }

    public function ratings(){
      return $this->hasMany(Rating::class);
    }

    public function reviews(){
      return $this->hasMany(Review::class);
    }

    public function observators(){
      return $this->hasMany(Observation::class);
    }

    public function followers(){
      return $this->hasMany(Observation::class, 'watched_id');
    }

    public function following(){
      return $this->hasMany(Observation::class, 'follower_id');
    }

    public function information(){
      return $this->belongsTo(Information::class);
    }
}
