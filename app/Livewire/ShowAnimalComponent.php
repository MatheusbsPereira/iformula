<?php

namespace App\Livewire;

use App\Models\Exigencia;
use App\Models\Nutriente;
use Livewire\Component;

class ShowAnimalComponent extends Component
{
    public $animal;
    public $valoresmin = [];
    public $valoresmax = [];
    public $valoreseditarmin = [];
    public $valoreseditarmax = [];
    public $editarforms = [];
    public function render()
    {
        $nutrientesNaoRelacionados = Nutriente::whereDoesntHave('animais', function ($query) {
            $query->where('animal_id', $this->animal->id)->where('animais.user_id',auth()->id());
        })->where('nutrientes.user_id',auth()->id())->get();
        return view('livewire.show-animal-component', ['nutrientes_adicionar' => $nutrientesNaoRelacionados]);
    }
    public function mount($animal)
    {
        $this->animal = $animal;
        $this->resetarEditar();
    }
    public function resetarEditar(){
        foreach ($this->animal->nutrientes as $nutriente) {
            $this->editarforms[$nutriente->pivot->id] = false;
            $this->valoreseditarmax[$nutriente->pivot->id] = $nutriente->pivot->valormax;
            $this->valoreseditarmin[$nutriente->pivot->id] = $nutriente->pivot->valormin;
        }
    }
    public function adicionarNutriente($id)
    {
        $rules = [
            "valoresmin.$id" => 'required|numeric|max:999999.99',
            "valoresmax.$id" => 'required|numeric|max:999999.99'
        ];
        $messages = [
            "valoresmin.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoresmin.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
            "valoresmax.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoresmax.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
        ];
        $this->validate($rules, $messages);
        Exigencia::create([
            'valormin' => $this->valoresmin[$id],
            'valormax' => $this->valoresmax[$id],
            'nutriente_id' => $id,
            'animal_id' => $this->animal->id,
            'user_id' => auth()->id()
        ]);
        
        return redirect()->to(route('animal.show',['nome'=>$this->animal->nome]));

    }
    public function deletarNutrienter($id)
    {
        $exigencia = Exigencia::find($id);
        $exigencia->delete();
        return redirect()->to(route('animal.show',['nome'=>$this->animal->nome]));
    }
    public function editarValor($id)
    {
        $this->editarforms[$id] = true;
        $this->render();
    }
    public function atualizarValor($id)
    {
        $rules = [
            "valoreseditarmin.$id" => 'required|numeric|max:999999.99',
            "valoreseditarmin.$id" => 'required|numeric|max:999999.99',
        ];
        $messages = [
            "valoreseditarmin.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoreseditarmin.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
            "valoreseditarmax.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoreseditarmax.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
            
        ];
        $this->validate($rules, $messages);
        $exigencia = Exigencia::find($id);
        $exigencia->valormin = $this->valoreseditarmin[$id];
        $exigencia->valormax = $this->valoreseditarmax[$id];
        $exigencia->save();
        $this->editarforms[$id] = false;
        $this->render();
    }
}