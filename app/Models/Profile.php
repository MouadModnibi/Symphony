<?php



namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ THIS
use Illuminate\Notifications\Notifiable;

class Profile extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
}

