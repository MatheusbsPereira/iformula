<?php

namespace App\Livewire;

use App\Livewire\Forms\IngredienteCreateform;
use App\Models\Formacao;
use App\Models\Ingrediente;
use App\Models\Nutriente;
use App\Rules\NomeIngrediente;
use Livewire\Component;
use Livewire\WithPagination;

class IngredienteComponent extends Component
{
    use WithPagination;
    public string $nome = '';
    public string $tag;
    public  $preco = '';
    public $nutrientes = [];
    public $valores = [];
    public function render()
    {
        return view('livewire.ingrediente-component', ['nutrientes_escolher' => Nutriente::where('user_id',auth()->id())->get(),'ingredientes'=>Ingrediente::orderByDesc('id')->where('user_id',auth()->id())->paginate(6)]);
    }
    public function save()
    {


        $rules = [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99','numeric'],
            'tag' => ['required', 'max:10'],
        ];
        $messages = [];
        foreach ($this->nutrientes as $key => $nutriente) {
            $rules["valores.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valores.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valores.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
        }
        $this->validate($rules,$messages);
        

        Ingrediente::create([
            'nome' => $this->nome,
            'preco' => $this->preco,
            'tag' => $this->tag,
            'user_id' => auth()->id()
        ]);
        $ingrediente = Ingrediente::orderByDesc('id')->first();
        foreach ($this->nutrientes as $key => $nutriente) {
            Formacao::create([
                'valor' => $this->valores[$nutriente],
                'nutriente_id' => $nutriente,
                'ingrediente_id' => $ingrediente->id,
                'user_id'=>auth()->id()
            ]);
        }
    }
}
