<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'name',
        'age',
        'email',
        'sexo'
        
    ];


    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];

}
