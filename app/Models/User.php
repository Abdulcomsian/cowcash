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
     * @var string[]
     */
    protected $fillable = [
        'image',
        'name',
        'email',
        'phone_number',
        'role',
        'email_verified_at',
        'password',
        'status',
        'siliver_coins',
        'gold_coins',
        'referal_coins',
        'referal_link',
        'affiliate_id',
        'referred_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForFcm()
    {
        return $this->fcm_token;
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function totalaffiliate()
    {
        return $this->hasMany(User::class, 'referred_by', 'affiliate_id');
    }
}
