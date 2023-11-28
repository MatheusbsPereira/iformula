<?php

namespace App\Livewire;

use App\Models\Ingrediente;
use App\Models\Racao;
use Livewire\Component;


class ShowFabricaComponent extends Component
{
    public array $ingredientes_adicionados = [];
    public array $racoes_adicionadas = [];
    public int $racao_contagem = 0;
    public array $valoresmin;
    public array $valoresmax;
    public $fabrica;
    public $id;
    public function render()
    {
        $ingredientes_adicionar = Ingrediente::where('user_id', auth()->id())->get();
        $racoes_adicionar = Racao::where('user_id', auth()->id())->get();
        return view('livewire.show-fabrica-component', ['ingredientes' => $ingredientes_adicionar, 'racoes' => $racoes_adicionar]);
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
        $this->id = $fabrica->id;
    }
    public function adicionar($id)
    {
        $this->ingredientes_adicionados[] = $id;
    }
    public function adicionarRacao($id)
    {
        $this->racoes_adicionadas[] = $id;
        $this->racao_contagem++;
    }
    public function formular()
    {
        $rules = [];
        foreach ($this->ingredientes_adicionados as  $ingrediente) {
            $rules["valoresmin.$ingrediente"] = 'required|numeric|max:999999.99';
            $rules["valoresmax.$ingrediente"] = 'required|numeric|max:999999.99';
        }
        $this->validate($rules);
        $ingredientes = Ingrediente::with('nutrientes')->whereIn('id', $this->ingredientes_adicionados)->get();
        $racoes = Racao::with('nutrientes')->whereIn('id', $this->racoes_adicionadas)->get();
        // Criar um array associativo com os dados relevantes dos ingredientes
        $dados = [];
        $dados_ingredientes = [];
        foreach ($racoes as $racao) {
            # code...
            foreach ($racao->nutrientes as $nutriente) {
                $requisitos[$nutriente->nome] = [
                    'min' => floatval($nutriente->pivot->valormin),
                    'max' => floatval($nutriente->pivot->valormax),
                ];
            }
            foreach ($ingredientes as $ingrediente) {
                $nutrientes = $ingrediente->nutrientes;
                $nutrientes_array = [];
                foreach ($nutrientes as $nutriente) {
                    $nutrientes_array[$nutriente->nome] = is_numeric($nutriente->pivot->valor) ? $nutriente->pivot->valor : 0;
                }

                $dados_ingredientes[$ingrediente->nome] = [
                    'custo' => $ingrediente->preco,
                    'nutrientes' => $nutrientes_array,
                    'min' => floatval($this->valoresmin[$ingrediente->id]),
                    'max' => floatval($this->valoresmax[$ingrediente->id]),
                ];
            }
            //dd($requisitos,$dados_ingredientes);
            // Converte o array de ingredientes em JSON
            $misturador = floatval($this->fabrica->capacidade_do_misturador);
            $dados_json = json_encode(["ingredientes" => $dados_ingredientes, "requisitos" => $requisitos, "misturador" => ["capacidade"=>$misturador]]);

            $dados_json = str_replace('"', '\"', $dados_json);

            $currentDirectory = getcwd();
            chdir(__DIR__);
            exec("2>&1 python Formular.py $dados_json", $output, $e);
            chdir($currentDirectory);
            //dd($output);
            //$dados[]=  $output;
        }
        dd($output);
    }
}
