<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'folio',
        'descripcion',
        'acta',
        'ine',
        'cv',
        'ced_prof',
        'ced_esp',
        'doc_migr',
        'cert_med',
        'cert_prep',
        'cert_prep_tec',
        'curp',
        'licencia_manejo',
        'comprobante_domicilio',
        'category_id'
    ];

    //Relación de 1:1
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación de 1:n
    public function postulants()
    {
        return $this->hasMany(Postulant::class);
    }
}
