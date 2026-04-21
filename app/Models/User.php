<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userRole()
    {
        return match ($this->role) {
            '1' => [
                'label' => 'Admin',
                'bg'    => 'bg-red-100',
                'text'  => 'text-red-700',
            ],
            '2' => [
                'label' => 'User',
                'bg'    => 'bg-green-100',
                'text'  => 'text-green-700',
            ],
            default => [
                'label' => 'Unknown',
                'bg'    => 'bg-gray-100',
                'text'  => 'text-gray-700',
            ],
        };
    }

    public function isAdmin(): bool
    {
        return $this->role === '1';
    }

    public function isUser(): bool
    {
        return $this->role === '2';
    }
}