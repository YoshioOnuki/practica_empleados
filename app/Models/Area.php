<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'id_area';
    protected $fillable = [
        'id_area',
        'nombre_area',
        'estado_area',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_area');
    }

    public $timestamps = false;

}
