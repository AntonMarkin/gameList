<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    use HasFactory;
    protected $table = 'developers';
    public function games()
    {
        return $this->hasMany(Games::class,'developer_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publishers::class,'publisher_id');
    }
}
