<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetCodePassword extends Model
{
    //public $timestamps = false;
    protected $fillable = [
        'email',
        'code',
        'created_at',
    ];

    use HasFactory;
}
