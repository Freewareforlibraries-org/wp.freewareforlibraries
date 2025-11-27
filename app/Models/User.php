<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'library',
        'phone',
        'addr',
        'city',
        'state',
        'zip',
        'email',
        'password',
        'library_uid',
        'account_type',
        'approval_status',
        'usertype',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function isAdmin(): bool
    {
        return $this->account_type === 'admin';
    }

    public function isStaff(): bool
    {
        return $this->account_type === 'staff';
    }
}
