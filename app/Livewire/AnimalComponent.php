<?php

namespace App\Livewire;

use App\Models\Animal;
use App\Models\Exigencia;
use App\Models\Nutriente;
use App\Rules\NomeAnimal;
use Livewire\Component;
use Livewire\WithPagination;

class AnimalComponent extends Component
{
    use WithPagination;
    public string $nome = '';
    public string $tag;
    public  $descricao = '';
    public $nutrientes = [];
    public $valoresmin = [];
    public $valoresmax = [];
    public function render()
    {
        return view('livewire.animal-component', ['nutrientes_escolher' => Nutriente::where('user_id',auth()->id())->get(),'animais'=>Animal::orderByDesc('id')->where('user_id',auth()->id())->paginate(6)]);
    }
    public function save()
    {

        $rules = [
            'nome' => ['required', 'max:50', new NomeAnimal],
            'descricao' => ['required'],
            'tag' => ['required', 'max:10'],
        ];
        $messages = [];
        foreach ($this->nutrientes as $key => $nutriente) {
            $rules["valoresmin.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valoresmin.$nutriente.required"] = "O valor mínimo do nutriente escolhido é obrigatório.";
            $messages["valoresmin.$nutriente.numeric"] = "O valor mínimo do nutriente escolhido deve ser numérico.";
            $rules["valoresmax.$nutriente"] = "required|numeric|max:999999.99|gt:valoresmin.$nutriente";
            $messages["valoresmax.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valoresmax.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
            $messages["valoresmax.$nutriente.gt"] = "O valor máximo para $nutriente deve ser maior que o valor mínimo.";
        }
        $this->validate($rules,$messages);
        

        Animal::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'tag' => $this->tag,
            'user_id' => auth()->id()
        ]);
        $animal = Animal::orderByDesc('id')->first();
        foreach ($this->nutrientes as $key => $nutriente) {
            Exigencia::create([
                'valormin' => $this->valoresmin[$nutriente],
                'valormax'=> $this->valoresmax[$nutriente],
                'nutriente_id' => $nutriente,
                'animal_id' => $animal->id,
                'user_id'=>auth()->id()
            ]);
        }
    }
}
