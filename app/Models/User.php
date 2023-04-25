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
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'cover'
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
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getProfileImageAttribute(): ?string
    {
        if ($this->image) {
            dd(asset('images/' . $this->image));
            return asset('images/' . $this->image);
        }

        return null;
    }
    public function getCoverImageAttribute(): ?string
    {
        if ($this->cover) {
            return asset('images/' . $this->image);
        }

        return null;
    }
    public function getCurrentUserImages(): array
    {
        $profileImage = auth()->user()->image ?? null;
        $coverImage = auth()->user()->cover ?? null;

        return [
            'profile_image' => $profileImage ? asset('images/' . $this->image) : null,
            'cover_image' => $coverImage ? asset('images/' . $this->image) : null,
        ];
    }
    public function getUserName()
    {
        return $this->name;
    }
}
