<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'id_emp';
    protected $fillable = [
        'id_emp',
        'codigo_emp',
        'salario_emp',
        'fecha_ingreso_emp',
        'estado_emp',
        'id_perso',
        'id_area',
        'id_moda',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_perso');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_moda');
    }

    public function beneficio()
    {
        return $this->belongsToMany(Beneficio::class, 'empleado_beneficio', 'id_emp', 'id_bene');
    }

    public function getNombreCompletoAttribute()
    {
        return $this->persona->apellido_pat_perso . ' ' . $this->persona->apellido_mat_perso . ', ' . $this->persona->nombres_perso;
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('codigo_emp', 'like', '%' . $search . '%')
            ->orWhere('salario_emp', 'like', '%' . $search . '%')
            ->orWhere('fecha_ingreso_emp', 'like', '%' . $search . '%')
            ->orWhereHas('persona', function ($query) use ($search) {
                $query->where('documento_perso', 'like', '%' . $search . '%')
                    ->orWhere(DB::raw("CONCAT(nombres_perso, ' ', apellido_pat_perso, ' ', apellido_mat_perso)"), 'like', '%' . $search . '%');
            })
            ->orWhereHas('area', function ($query) use ($search) {
                $query->where('nombre_area', 'like', '%' . $search . '%');
            })
            ->orWhereHas('modalidad', function ($query) use ($search) {
                $query->where('nombre_moda', 'like', '%' . $search . '%');
            });
    }

    public $timestamps = false;

}
