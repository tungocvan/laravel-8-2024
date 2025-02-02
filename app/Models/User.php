<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Modules\Groups\Models\Groups;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'phone',
        'birthday',
        'password',
        'provider_id',
        'provider',
        'group_id',
        'status',
        'avatar'
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

    public function group(){        
        return $this->hasOne(Groups::class,'id','group_id');
    }

    // protected $dispatchesEvents = [
    //     'creating' => "App\Events\UserUpdateEvent"
    // ];
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
}
