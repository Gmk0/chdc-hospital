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
        'email',
        'password',
        'join',
        'firstname',
        'phone',
        'role'
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

    public function isAgent():bool
    {
        return $this->role=="Agent";


    }

    public function isDoctor(): bool {
        return $this->role == "Medecion";
    }

    public function isInfirmier(): bool
    {
        return $this->role == "Medecion";
    }
    public function isLaboration(): bool{
        return $this->role == "Laboration";
    }
    public function isAdmin(): bool{
        return $this->role == "Admin";
    }

    public function isNoRole() {}

    public function getRedirect(): String
    {


        return match ($this->role) {
            'Agent' => 'agent.dashboard',
            'Admin' => 'admin.dashboard',
            'Medecin' => 'medecin.dashboard',
            'Infirmier' => 'infirmier.dashboard',
            'no role'=>'no_role.dashboard'
        };
    }
}
