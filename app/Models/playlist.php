<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // ✅ autorise l'attribution de masse sur 'name'

    // Si tu as d'autres relations :

    public function user()
{
    return $this->belongsTo(User::class);
}

public function songs()
{
    return $this->belongsToMany(Song::class); // ou Music::class
}


}  