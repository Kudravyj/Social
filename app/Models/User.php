<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',

    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($user) {
            $user->profile()->create([
                'text'=> $user->username,
                'user_id'=> $user->id
            ]);
        
        
        });
    }

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

    public function posts()
    {
        return $this->hasMany(Post::class)->OrderBy('created_at', 'DESC');
    }

    public function followings()
    {
        return $this->belongsToMany(profile::class);
    }
    

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    public function isFriend(User $user)
    {
       return User::where('user_id', auth()->user->id);
    }
}
