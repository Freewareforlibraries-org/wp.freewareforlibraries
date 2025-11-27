<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'uid',
        'contact_name',
        'contact_phone',
        'city',
        'state',
        'status',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
        ];
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function prints()
    {
        return $this->hasMany(WirelessPrinting::class);
    }

    public function adminUser()
    {
        return $this->hasOne(User::class)->where('account_type', 'admin');
    }

    public function staffUsers()
    {
        return $this->hasMany(User::class)->where('account_type', 'staff');
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }
}
