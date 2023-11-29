<?php

namespace App\Livewire;

use App\Models\Exigencia;
use App\Models\Fabrica;
use App\Models\Nutriente;
use App\Models\Racao;
use Livewire\Component;
use Jenssegers\Agent\Agent;

class RacaoModal extends Component
{
    public string $nome;
    public string $tag;
    public string $descricao = '';
    public $idade = '';
    public $peso = '';
    public array $nutrientes_adicionados = [];
    public array $valoresmin;
    public array $valoresmax;
    public int $etapa = 1;
    public $search = '';
    public $isMobile;
    public $fabrica_id;
    protected function rules()
    {
        return [
            'nome' => ['required', 'max:50'],
            'idade' => ['required', 'max:9999.99', 'integer'],
            'peso' => ['required', 'max:9999', 'regex:/^\d{1,3}(\.\d{3})*(\,\d{2})?$/'],
            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
        ];
    }
    public function render()
    {
        $nutrientes = Nutriente::orderByDesc('id')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())->where('nome', 'like', "{$this->search}%");
            })->get();
        return view('livewire.racao-modal', ['nutrientes' => $nutrientes]);
    }
    public function close()
    {
        $this->nome = '';
        $this->tag = '';
        $this->idade = '';
        $this->peso = '';
        $this->descricao = '';
        $this->etapa = 1;
        $this->dispatch('close-modal');
        $this->resetErrorBag();
    }
    public function anterior()
    {
        $this->etapa -= 1;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($id)
    {
        $this->fabrica_id = $id;
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
    }
    public function primeiraEtapa()
    {
        $this->validate();

        // Se a validação for bem-sucedida, avança para a próxima etapa
        $this->etapa = 2;
    }
    public function adicionar($id)
    {
        $this->nutrientes_adicionados[] = $id;
    }
    public function tirar($id)
    {
        $key = array_search($id, $this->nutrientes_adicionados);
        unset($this->nutrientes_adicionados[$key]);
        unset($this->valoresmin[$key]);
        unset($this->valoresmax[$key]);
    }
    public function segundaEtapa()
    {
        $this->primeiraEtapa();
        //dd($this->valores);

        $rules = [];
        foreach ($this->nutrientes_adicionados as  $nutriente) {
            $rules["valoresmin.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valoresmin.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valoresmin.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
            $rules["valoresmax.$nutriente"] = 'required|numeric|max:999999.99';
            $messages["valoresmax.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valoresmax.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
        }
        $this->etapa = 2;
        $this->validate($rules, $messages);
        $this->peso = str_replace(',', '.', $this->peso);

        // Converter para decimal
        $this->peso = floatval($this->peso);
        Racao::create([
            'nome' => $this->nome,
            'idade' => $this->idade,
            'peso' => $this->peso,
            'tag' => $this->tag,
            'descricao' => $this->descricao,
            'user_id' => auth()->id(),
            'fabrica_id' => $this->fabrica_id
        ]);
        $racao = Racao::orderByDesc('id')->first();
        foreach ($this->nutrientes_adicionados as $key => $nutriente) {
            Exigencia::create([
                'valormin' => $this->valoresmin[$nutriente],
                'valormax' => $this->valoresmax[$nutriente],
                'nutriente_id' => $nutriente,
                'racao_id' => $racao->id,
                'user_id' => auth()->id(),
                
            ]);
        }
        $fabrica = Fabrica::find($this->fabrica_id);
        return redirect()->to(route('fabrica.show', ['especie' => $fabrica->especie]));
    }
    public function terceiraEtapa()
    {
       
    }
}
