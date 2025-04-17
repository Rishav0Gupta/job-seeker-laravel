<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // if user is Admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // if user is Employer
    public function isEmployer()
    {
        return $this->role === 'employer';
    }

    // if user is a normal User
    public function isUser()
    {
        return $this->role === 'user';
    }


    // relationship

   public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }



}
