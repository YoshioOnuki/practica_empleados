<?php

namespace App\Livewire\Empleado;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\EmpleadoBeneficio;
use App\Models\Modalidad;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public $titulo = 'Ver Empleado';
    public $modo = 'ver';

    public $id_emp;
    #[Validate('required')]
    public $nombre;
    #[Validate('required')]
    public $apellido_paterno;
    #[Validate('required')]
    public $apellido_materno;
    #[Validate('required')]
    public $documento;
    public $edad;
    #[Validate('required')]
    public $fecha_nacimiento;
    #[Validate('required')]
    public $genero;
    public $salario;
    public $fecha_ingreso;
    #[Validate('required')]
    public $area;
    #[Validate('required')]
    public $modalidad;
    public $ant_empresa;
    public $estado;

    public function mount($id_emp)
    {
        $this->id_emp = $id_emp;
        $this->modo = session('modo');
        $this->titulo = $this->modo === 'ver' ? 'Ver Empleado' : 'Editar Empleado';

        $empleado = Empleado::find($id_emp);
        $this->nombre = $empleado->persona->nombres_perso;
        $this->apellido_paterno = $empleado->persona->apellido_pat_perso;
        $this->apellido_materno = $empleado->persona->apellido_mat_perso;
        $this->documento = $empleado->persona->documento_perso;
        $this->fecha_nacimiento = $empleado->persona->fecha_naci_perso;

        $this->edad = date_diff(date_create($this->fecha_nacimiento), date_create('now'))->y;
        if($this->modo === 'ver')
        {
            $this->genero = $empleado->persona->genero_perso === 'M' ? 'Masculino' : 'Femenino';
        }else{
            $this->genero = $empleado->persona->genero_perso;
        }
        $this->salario = $empleado->salario_emp;
        $this->fecha_ingreso = $empleado->fecha_ingreso_emp;
        if($this->modo === 'ver')
        {
            $this->area = $empleado->area->nombre_area;
            $this->modalidad = $empleado->modalidad->nombre_moda;
        }else{
            $this->area = $empleado->id_area;
            $this->modalidad = $empleado->id_moda;

        }

        $fecha_ingreso = date_create($this->fecha_ingreso);
        $this->ant_empresa = CalcularAntiguedadEmpresa($fecha_ingreso, date_create('now'));
        
        $this->estado = $empleado->estado_emp;
    }

    public function guardar()
    {
        $this->validate();

        $empleado = Empleado::find($this->id_emp);
        $empleado->fecha_ingreso_emp = $this->fecha_ingreso;
        $empleado->id_area = $this->area;
        $empleado->id_moda = $this->modalidad;
        $empleado->estado_emp = $this->estado;
        $empleado->save();

        $persona = $empleado->persona;
        $persona->nombres_perso = $this->nombre;
        $persona->apellido_pat_perso = $this->apellido_paterno;
        $persona->apellido_mat_perso = $this->apellido_materno;
        $persona->documento_perso = $this->documento;
        $persona->fecha_naci_perso = $this->fecha_nacimiento;
        $persona->genero_perso = $this->genero;
        $persona->save();

        session(['mensaje_guardar' => 'editar']);
        
        return redirect()->route('empleados');
    }

    public function render()
    {
        $area_model = Area::where('estado_area', 1)->get();
        $modalidad_model = Modalidad::where('estado_moda', 1)->get();
        $emp_bene_model = EmpleadoBeneficio::where('id_emp', $this->id_emp)->get();

        return view('livewire.empleado.edit', [
            'area_model' => $area_model,
            'modalidad_model' => $modalidad_model,
            'emp_bene_model' => $emp_bene_model
        ]);
    }
}
