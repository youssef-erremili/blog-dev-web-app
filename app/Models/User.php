<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_picture',
        'password',
        'location',
        'bio',
        'views'
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
    public function saves(): HasMany
    {
        return $this->hasMany(Save::class);
    }

    // to fetch user saved articles
    public function savedarticles(): BelongsToMany
    {
        return $this->BelongsToMany(Post::class, 'saves');
    }

    // Relationship to get the users this user is following
    public function following(): HasMany
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    // Relationship to get the users following this user
    public function followers(): HasMany
    {
        return $this->hasMany(Follow::class, 'author_id');
    } 

    public function views()
    {
        $sessionKey = "is_user_{{$this->id}}_viewed";
        if (! session()->get($sessionKey)) {
            self::withoutTimestamps( function(){
                $this->increment('views');
            });
            session()->put($sessionKey, true);
        }

        return $this->views;
    } 
    
    
}
