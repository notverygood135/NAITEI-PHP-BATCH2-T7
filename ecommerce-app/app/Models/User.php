<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'is_admin',
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

    protected $casts = [
        'id' => 'string'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function userPayments(): HasMany
    {
        return $this->hasMany(UserPayment::class);
    }

    public function userReview(): HasMany
    {
        return $this->hasMany(UserReview::class);
    }
        
    public function viewedProducts(): HasMany
    {
        return $this->hasMany(ViewedProduct::class);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->attributes['first_name'] . ' ' . $this->attributes['last_name'],
        );
    }

    protected function username(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::slug($value),
        );
    }
}
