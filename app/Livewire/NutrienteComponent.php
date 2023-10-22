<?php

namespace App\Livewire;


use App\Models\Nutriente;
use App\Rules\NomeNutriente;
use Livewire\Component;
use Livewire\WithPagination;

class NutrienteComponent extends Component
{
    use WithPagination;

    public string $nome = '';
    
    public string $unidade = '';
    public string $tag = '';
    public int $id_nutriente_exibir;
    public $perPage = 30;
    public bool $exibirModal = false;
    public function render()
    {
        $nutrientes = Nutriente::orderByDesc('id')
            ->where('user_id', auth()->id())
            ->paginate($this->perPage);

        return view('livewire.nutriente-component', ['nutrientes' => $nutrientes]);
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
    }

    protected $listeners = ['nutrienteExcluido' => 'atualizarListaNutrientes'];

    public function atualizarListaNutrientes()
    {
        Nutriente::orderBy('id')
            ->where('user_id', auth()->id())
            ->paginate($this->perPage);
    }

    public function save(): void
    {
        $this->validate($this->rules());
        Nutriente::query()->create([
            'nome' => $this->nome,
            'unidade' => $this->unidade,
            'tag' => $this->tag,
            'user_id' => auth()->id()
        ]);
        $this->nome= "";
        $this->unidade = "";
        $this->tag = "";

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
