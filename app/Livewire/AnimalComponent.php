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
    public $valores = [];
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
            $rules["valores.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valores.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valores.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
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
                'valornut' => $this->valores[$nutriente],
                'nutriente_id' => $nutriente,
                'animal_id' => $animal->id,
                'user_id'=>auth()->id()
            ]);
        }
    }
}
