<?php

namespace App\Livewire\Home;

use App\Models\Empleado;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Index extends Component
{

    public $cant_empleados = 0;

    public function mount()
    {
        $this->cant_empleados = Empleado::all()->count();
    }

    public function render()
    {
        return view('livewire.home.index');
    }
}
