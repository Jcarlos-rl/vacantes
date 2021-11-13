<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_id',
        'user_id'
    ];
}
