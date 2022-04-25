<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    protected $table = 'games';
    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'games_genres', 'game_id', 'genre_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publishers::class,'publisher_id');
    }
    public function developer()
    {
        return $this->belongsTo(Developers::class,'developer_id');
    }
}
