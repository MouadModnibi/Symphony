<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    // app/Models/Subscription.php
protected $fillable = ['user_id', 'plan', 'status', 'trial_ends_at', 'ends_at'];

protected $casts = [
    'trial_ends_at' => 'datetime',
    'ends_at' => 'datetime',
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function isActive()
{
    return $this->status === 'active' || 
           ($this->status === 'trialing' && $this->trial_ends_at->isFuture());
}
}
