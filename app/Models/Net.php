<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Net extends Model
{
    use HasFactory;

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
