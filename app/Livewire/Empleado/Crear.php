<?php

namespace App\Livewire\Empleado;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\EmpleadoBeneficio;
use App\Models\Modalidad;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Crear extends Component
{
    public $id_emp;

    #[Validate('required')]
    public $nombre;
    #[Validate('required')]
    public $apellido_paterno;
    #[Validate('required')]
    public $apellido_materno;
    #[Validate('required')]
    public $documento;
    #[Validate('required')]
    public $fecha_nacimiento;
    #[Validate('required')]
    public $genero;
    #[Validate('required')]
    public $salario;
    #[Validate('required')]
    public $fecha_ingreso;
    #[Validate('required')]
    public $area;
    #[Validate('required')]
    public $modalidad;

    public function guardar()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $persona = new Persona();
            $persona->nombres_perso = $this->nombre;
            $persona->apellido_pat_perso = $this->apellido_paterno;
            $persona->apellido_mat_perso = $this->apellido_materno;
            $persona->documento_perso = $this->documento;
            $persona->fecha_naci_perso = $this->fecha_nacimiento;
            $persona->genero_perso = $this->genero;
            $persona->save();

            $empleado = new Empleado();
            $empleado->codigo_emp = generarCodigoEmpleado();
            $empleado->salario_emp = $this->salario;
            $empleado->fecha_ingreso_emp = $this->fecha_ingreso;
            $empleado->id_perso = $persona->id_perso;
            $empleado->id_area = $this->area;
            $empleado->id_moda = $this->modalidad;
            $empleado->estado_emp = 1;
            $empleado->save();

            DB::commit();

            return redirect()->route('empleados');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->dispatch('toast-basico', [
                'mensaje' => 'Error al crear el empleado',
                'type' => 'error'
            ]);
        }
    }
    
    public function render()
    {
        $area_model = Area::where('estado_area', 1)->get();
        $modalidad_model = Modalidad::where('estado_moda', 1)->get();
        $emp_bene_model = EmpleadoBeneficio::where('id_emp', $this->id_emp)->get();
        
        return view('livewire.empleado.crear', [
            'area_model' => $area_model,
            'modalidad_model' => $modalidad_model,
            'emp_bene_model' => $emp_bene_model
        ]);
    }
}
