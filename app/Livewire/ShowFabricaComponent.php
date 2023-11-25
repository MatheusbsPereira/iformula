<?php

namespace App\Livewire;

use App\Models\Ingrediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowFabricaComponent extends Component
{
    public array $ingredientes_adicionados = [];
    public $fabrica;
    public function render()
    {
        
        $ingredientes_adicionar  = Ingrediente::where('user_id', auth()->id())->get();;
        return view('livewire.show-fabrica-component',['ingredientes'=>$ingredientes_adicionar]);
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
        
    }
    public function adicionar($id){
        $this->ingredientes_adicionados[]= $id;
    }
}
