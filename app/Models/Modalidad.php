<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidad';
    protected $primaryKey = 'id_moda';
    protected $fillable = [
        'id_moda',
        'nombre_moda',
        'estado_moda',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_moda');
    }

    public $timestamps = false;
    
}
