<?php

namespace App\Livewire;

use Livewire\Component;
use App\Rules\NomeIngrediente;
use Jenssegers\Agent\Agent;
class IngredienteModal extends Component
{
    public string $nome;
    public string $tag;
    public string $descricao;
    public  $preco = '';
    public int $etapa = 1;
    public $isMobile;

    public function mount() {
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
    }


    public function render()
    {
        return view('livewire.ingrediente-modal');
    }
    public function close(){
        $this->nome = '';
        $this->tag = '';
        $this->preco = '';
        $this->descricao = '';
        $this->etapa = 1;
        $this->dispatch('close-modal');
    }
    public function anterior()
    {
        $this->etapa -= 1;
    }
    public function voltarTudo(){
        $this->etapa = 1;
    }
    public function primeiraEtapa (){
        $rules = [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99','numeric'],
            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
        ];
        $message = [
            'preco.numeric'=> 'Valor inválido',
        ];
        $this->etapa = 1;
        $this->validate($rules, $message);
        $this->etapa = 2;
         
    }
    public function segundaEtapa()
    {
        $this->primeiraEtapa();
    }
    
}
