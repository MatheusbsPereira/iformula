<?php

namespace App\Livewire;

use Livewire\Component;

class ShowFabricaRacoesComponent extends Component
{
    public function render()
    {
        $racoes = $this->fabrica->racoes;
        return view('livewire.show-fabrica-racoes-component',['racoes'=>$racoes]);
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
        $this->id = $fabrica->id;
    }
    public $fabrica;
    public $id;
}
