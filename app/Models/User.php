<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'password',
        'bio',
        'pfp',
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
        'plan_expires_at' => 'datetime',
    'trial_ends_at' => 'datetime'
    ];
    public function playlists()
{
    return $this->hasMany(Playlist::class);
}
       public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}





public function payments()
{
    return $this->hasMany(Payment::class);
}

public function activeSubscription()
{
    return $this->hasOne(Subscription::class)
        ->where('status', 'active')
        ->orWhere(function($query) {
            $query->where('status', 'trialing')
                  ->where('trial_ends_at', '>', now());
        });
}

public function isOnTrial()
{
    return $this->trial_ends_at && $this->trial_ends_at->isFuture();
}

public function isPremium()
{
    return $this->is_premium || 
           ($this->activeSubscription && $this->activeSubscription->isActive());
}




}
