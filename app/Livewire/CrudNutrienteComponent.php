<?php

namespace App\Livewire;

use App\Models\Nutriente;
use App\Rules\NomeNutriente;
use Livewire\Component;

class CrudNutrienteComponent extends Component
{
    public int $id;
    public string $nome;
    public string $tag;
    public string $unidade;
    public function render()
    {
        return view('livewire.crud-nutriente-component');
    }
    public function mount($id)
    {
        $nutriente = Nutriente::find($id);
        $this->id = $nutriente->id;
        $this->nome = $nutriente->nome;
        $this->tag = $nutriente->tag;
        $this->unidade = $nutriente->unidade;
        $this->dispatch('showModal');
    }
    public function save( )
    {
        $this->validate($this->rules());
        $nutriente = Nutriente::find($this->id);
        $nutriente->nome =$this->nome;
        $nutriente->tag =$this->tag;
        $nutriente->unidade =$this->unidade;
        $nutriente->save();
        return redirect()->to(route('nutriente.index'));
    }
    public function rules()
    {
        return [
            'nome' => ['required', 'max:50', new NomeNutriente],
            'unidade' => ['required', 'max:6'],
            'tag' => ['required', 'max:10'],
        ];
    }
    
}
