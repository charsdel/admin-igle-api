<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    public function nets()
    {
        return $this->hasMany(Net::class);
    }

    public function homes()
    {
        return $this->hasManyThrough(Home::class, Net::class);

    }
}
