<?php

namespace App\Livewire\Components;

use App\Models\Empleado;
use Livewire\Component;

class Header extends Component
{
    public $ruta_foto_usua;
    public $usuario;
    public $persona;
    public $nombre;

    public function logout() 
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function mount() 
    {
        $usuario = auth()->user();
        $this->ruta_foto_usua = $usuario->persona->ruta_foto_usua ?? '/media/avatar-none.webp';
        $this->usuario = auth()->user();
        $this->persona = $this->usuario->persona;
        $this->nombre = $this->persona->soloPrimerosNombres;
    }

    public function render() 
    {
        return view('livewire.components.header');
    }
}
