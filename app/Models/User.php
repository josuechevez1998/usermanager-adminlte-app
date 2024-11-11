<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'state',
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
        'password' => 'hashed',
    ];

    public function adminlte_profile_url()
    {
        return 'users/profile';
    }

    public function userPhoto()
    {
        return $this->hasOne(UserPhoto::class, 'user_id', 'id');
    }

    public function adminlte_desc()
    {
       return $this->email;
    }

    public function adminlte_image()
    {
        // Asume que la relación ya ha sido cargada
        $userPhoto = $this->userPhoto;

        if ($userPhoto) {
            return asset('storage/' . $userPhoto->path . '/' . $userPhoto->name);
        }
    }
}
