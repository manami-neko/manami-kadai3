<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function weightTarget()
    {
        return $this->hasOne(WeightTarget::class);
    }

    public function weightLog()
    {
        return $this->hasOne(WeightLog::class);
    }
}
