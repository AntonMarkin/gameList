<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
    use HasFactory;
    protected $table = 'publishers';

    public function developer()
    {
        return $this->hasMany(Developers::class,'publisher_id');
    }
    public function games()
    {
        return $this->hasMany(Publishers::class,'publisher_id');
    }
}
