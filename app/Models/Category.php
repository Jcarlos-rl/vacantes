<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    //Relación de 1:n
    public function vacantes()
    {
        return $this->hasMany(Vacancy::class);
    }
}
