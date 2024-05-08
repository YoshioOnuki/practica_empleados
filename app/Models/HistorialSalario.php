<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialSalario extends Model
{
    use HasFactory;

    protected $table = 'historial_salario';
    protected $primaryKey = 'id_histo';
    protected $fillable = [
        'id_histo',
        'salario_act_histo',
        'salario_ant_histo',
        'fecha_cambio_histo',
        'id_emp',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_emp');
    }

    public $timestamps = false;

}
