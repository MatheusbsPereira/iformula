<?php

namespace App\Livewire;

use App\Models\Exigencia;
use App\Models\Nutriente;
use Livewire\Component;

class ShowAnimalComponent extends Component
{
    public $animal;
    public $valores = [];
    public $valoreseditar = [];
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
            $this->valoreseditar[$nutriente->pivot->id] = $nutriente->pivot->valor;
        }
    }
    public function adicionarNutriente($id)
    {
        $rules = [
            "valores.$id" => 'required|numeric|max:999999.99'
        ];
        $messages = [
            "valores.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valores.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
        ];
        $this->validate($rules, $messages);
        Exigencia::create([
            'valornut' => $this->valores[$id],
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
            "valoreseditar.$id" => 'required|numeric|max:999999.99'
        ];
        $messages = [
            "valoreseditar.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoreseditar.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
        ];
        $this->validate($rules, $messages);
        $exigencia = Exigencia::find($id);
        $exigencia->valornut = $this->valoreseditar[$id];
        $exigencia->save();
        $this->editarforms[$id] = false;
        $this->render();
    }
}
