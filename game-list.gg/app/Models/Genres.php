<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';

    public function games()
    {
        return $this->belongsToMany(Games::class);
    }
}
