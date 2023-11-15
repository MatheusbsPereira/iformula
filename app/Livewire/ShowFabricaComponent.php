<?php

namespace App\Livewire;

use Livewire\Component;

class ShowFabricaComponent extends Component
{
    public $fabrica;
    public function render()
    {
        return view('livewire.show-fabrica-component');
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
    }
}
