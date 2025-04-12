<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EscolhaAutenticacao extends Component
{
    public $mostrarProcessar = false;

    public function escolherAutenticar()
    {
        return redirect()->route('login');
    }

    public function continuarSemAutenticar()
    {
        $this->mostrarProcessar = true;
    }

    public function render()
    {
        if (Auth::check()) {
            $this->mostrarProcessar = true;
        }

        return view('livewire.escolha-autenticacao');
    }
}
