<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usua';
    protected $fillable = [
        'id_usua',
        'nombre_usua',
        'contrasenia_usua',
        'estado_usua',
        'ruta_foto_usua',
        'id_perso',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_perso');
    }

    public $timestamps = false;

}
