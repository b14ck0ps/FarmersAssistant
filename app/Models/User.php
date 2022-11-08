<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Users\Admins;
use App\Models\Users\Advisors;
use App\Models\Users\Farmers;
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
        'firstName',
        'lastName',
        'username',
        'dob',
        'gender',
        'city',
        'postalCode',
        'address',
        'phone',
        'photo',
        'email',
        'password',
        'photo',
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


    public function farmers()
    {
        return $this->hasMany(Farmers::class);
    }
    public function admins()
    {
        return $this->hasMany(Admins::class);
    }
    public function advisor()
    {
        return $this->hasMany(Advisors::class);
    }
    //get full name
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    //get user type
    public function getUserType()
    {
        if ($this->farmers()->count() > 0) {
            return 'FARMER';
        } elseif ($this->admins()->count() > 0) {
            return 'ADMIN';
        } elseif ($this->advisor()->count() > 0) {
            return 'ADVISOR';
        } else {
            return 'USER';
        }
    }
}
