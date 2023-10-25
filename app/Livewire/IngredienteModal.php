<?php

namespace App\Livewire;

use Livewire\Component;
use App\Rules\NomeIngrediente;
class IngredienteModal extends Component
{
    public string $nome;
    public string $tag;
    public  $preco = '';
    public int $etapa =1;
    public function render()
    {
        return view('livewire.ingrediente-modal');
    }
    public function close(){
        $this->dispatch('close-modal');
    }
    public function anterior()
    {
        $this->etapa -=1;
    }
    public function primeiraEtapa (){
        $rules = [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99','numeric'],
            'tag' => ['required', 'max:10'],
        ];
        $this->validate($rules);
        $this->etapa = 2;
         
    }
}
