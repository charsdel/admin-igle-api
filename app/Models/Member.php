<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Member extends Model
{
    use  HasFactory;

    
    protected $fillable = ['nombres', 'apellidos'];


    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
