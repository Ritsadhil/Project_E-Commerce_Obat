<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'Name',
        'Email_Address',
        'Password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'Password' => 'hashed',
        ];
    }

    /**
     * Get the password for the user.
     * Overriding default 'password' column to 'Password'
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }
    public function keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'users_id');
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'users_id');
    }
}
