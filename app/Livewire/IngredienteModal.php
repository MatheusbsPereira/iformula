<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Formacao;
use App\Models\Ingrediente;
use App\Models\Nutriente;
use App\Rules\NomeIngrediente;
use Jenssegers\Agent\Agent;


class IngredienteModal extends Component
{
    public string $nome;
    public string $categoria;
    public string $tag;
    public string $descricao;
    public array $nutrientes_adicionados = [];
    public array $valores;
    public $preco = '';
    public int $etapa = 1;
    public $search = '';
    public $isMobile;


    
    // Inicialize as regras no método rules()
    protected function rules()
    {
        return [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99', 'numeric'],
            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
            'categoria' => ['required', 'tipo_ingrediente'],
        ];
    }
    
    protected $messages = [
        'preco.numeric' => 'Valor inválido',
    ];

    public function mount()
    {
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
    }

    public function render()
    {
        $nutrientes = Nutriente::orderBy('nome')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())->where('nome', 'like', "{$this->search}%");
            })->get();
        return view('livewire.ingrediente-modal', ['nutrientes' => $nutrientes]);
    }

    public function close()
    {
        $this->nome = '';
        $this->tag = '';
        $this->preco = '';
        $this->descricao = '';
        $this->etapa = 1;
        $this->dispatch('close-modal');
        $this->resetErrorBag();
    }

    public function anterior()
    {
        $this->etapa -= 1;
        $this->dispatch('etapaMudou');
    }

    public function voltarTudo()
    {
        $this->etapa = 1;
        $this->dispatch('etapaMudou');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function primeiraEtapa()
    {
        $this->validate();
        $this->etapa = 2;
    }
    public function adicionar($id)
    {
        $this->nutrientes_adicionados[] = $id;
    }

    public function updatedPreco($value)
    {
        $this->preco = $value;
    }
    public function segundaEtapa()
    {
        $this->primeiraEtapa();
        //dd($this->valores);

        $rules = [];
        foreach ($this->nutrientes_adicionados as $nutriente) {
            $rules["valores.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valores.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valores.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
        }
        $this->etapa = 2;
        $this->validate($rules, $messages); 
        // Converter para decimal
        Ingrediente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'tag' => $this->tag,

            'categoria' => $this->categoria,
            'user_id' => auth()->id(),
        ]);
        
        $ingrediente = Ingrediente::orderByDesc('id')->first();
        foreach ($this->nutrientes_adicionados as $key => $nutriente) {
            Formacao::create([
                'valor' => $this->valores[$nutriente],
                'nutriente_id' => $nutriente,
                'ingrediente_id' => $ingrediente->id,
                'user_id' => auth()->id()
            ]);
        }
        return redirect()->to(route('ingrediente.show',['nome'=>$ingrediente->nome]));
    }

}
