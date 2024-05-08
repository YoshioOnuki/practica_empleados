<?php

namespace App\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\HistorialSalario;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Salario extends Component
{
    public $id_empleado;
    public $empleado;
    #[Validate('required')]
    public $salario_nuevo;
    public $salario_actual;
    public $salario_anterior;
    public $fecha;

    public function mount($id_emp)
    {
        $this->id_empleado = $id_emp;
        $this->empleado = Empleado::find($id_emp);
        $this->salario_actual = $this->empleado->salario_emp;
    }

    public function guardar()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $salario = new HistorialSalario();
            $salario->id_emp = $this->id_empleado;
            $salario->salario_ant_histo = $this->empleado->salario_emp;
            $salario->salario_act_histo = $this->salario_nuevo;
            $salario->fecha_cambio_histo = date('Y-m-d');
            $salario->save();

            $emple = Empleado::find($this->id_empleado);
            $emple->salario_emp = $salario->salario_act_histo;
            $emple->save();

            DB::commit();

            $this->mount($this->id_empleado);
            $this->reset('salario_nuevo');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch(
                'toast-basico',
                mensaje: 'Error al actualizar el salario',
                type: 'error'
            );
        }
        
    }

    public function render()
    {
        $salarios = HistorialSalario::where('id_emp', $this->id_empleado)
            ->orderBy('id_histo', 'desc')->get();

        return view('livewire.empleado.salario', [
            'salarios' => $salarios
        ]);
    }
}
