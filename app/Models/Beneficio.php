<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    use HasFactory;

    protected $table = 'beneficio';
    protected $primaryKey = 'id_bene';
    protected $fillable = [
        'id_bene',
        'nombre_bene',
        'operacion_bene',
        'mes_bene',
        'estado_bene',
    ];

    public function empleado()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_beneficio', 'id_bene', 'id_emp');
    }

    public $timestamps = false;

}
