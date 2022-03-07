<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;



    public function net()
    {
        return $this->belongsTo(Net::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
