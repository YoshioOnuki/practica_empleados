<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'id_perso';
    protected $fillable = [
        'id_perso',
        'documento_perso',
        'nombres_perso',
        'apellido_pat_perso',
        'apellido_mat_perso',
        'genero_perso',
        'fecha_naci_perso',
    ];

    public function usuario()
    {
        return $this->hasMany(Usuario::class, 'id_perso');
    }

    public function getSoloPrimerosNombresAttribute()
    {
        $nombres = explode(' ', $this->nombres_perso);
        return $nombres[0] . ' ' . $this->apellido_pat_perso;
    }

    public function getAvatarAttribute()
    {
        return $this->usuario->first()->ruta_foto_usua ?? 'media/usuario.webp';
    }

    public $timestamps = false;

}
