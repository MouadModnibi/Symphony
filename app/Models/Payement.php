<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'plan',
        'amount',
        'currency',
        'status',
        'payment_details'
    ];

    protected $casts = [
        'payment_details' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}