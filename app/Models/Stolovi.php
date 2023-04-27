<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stolovi extends Model
{
    use HasFactory;
    protected $fillable = ['broj_stola', 'zauzet', 'porudzbina'];
    protected $casts = [
        'porudzbina' => 'array'
    ];
}
