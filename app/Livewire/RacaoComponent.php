<?php

namespace App\Livewire;

use App\Models\Animal;
use App\Models\Ingrediente;
use Livewire\Component;

class RacaoComponent extends Component
{
    public function render()
    {
        $ingredientes = Ingrediente::where("user_id", auth()->user()->id)->get();
        $animais = Animal::where("user_id", auth()->user()->id)->get();
        return view('livewire.racao-component');
    }
}
