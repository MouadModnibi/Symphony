<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'file_path',
        'cover_image',
        'genre',
    ];
            public function getImageAttribute($value) {

        return $value??'song_im/song.png';
    }
    
}

