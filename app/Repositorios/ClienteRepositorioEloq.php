<?php

namespace App\Repositorios;

use App\Entidades\Cliente;
use App\Interfaces\ClienteRepositorioInterface;
use App\Models\ClienteModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

class ClienteRepositorioEloq implements ClienteRepositorioInterface
{
    private $model;

    public function __construct(ClienteModel $clienteModel)
    {
        $this->model = $clienteModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorCodigo(int $codigo)
    {
        return $this->model->where('id', '=', $codigo)->first();
    }

    public function salvar(Cliente $cliente)
    {
        $codigo = $cliente->getCodigo();
        $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = new ClienteModel();

        $model->codigo = $cliente->getCodigo();
        $model->nome = $cliente->getNome();
        $model->bairro = $cliente->getBairro();
        $model->cep = $cliente->getCep();
        $model->cnpj = $cliente->getCnpj();
        $model->email = $cliente->getEmail();
        $model->endereco = $cliente->getEndereco();
        $model->fax = $cliente->getFax();
        $model->insc_Estadual = $cliente->getInscricaoEstadual();
        $model->nome_Cidade = $cliente->getNomeCidade();
        $model->obs = $cliente->getObs();
        $model->uf = $cliente->getUf();
        $model->complemento = $cliente->getComplemento();
        $model->cpf = $cliente->getCpf();
        $model->data_Cadastro = $cliente->getDataCadastro();
        $model->fantasia = $cliente->getFantasia();
        $model->fone = $cliente->getFone();
        $model->numero = $cliente->getNumero();
        $model->rg = $cliente->getRg();
        $model->tipo_Pessoa = $cliente->getTipoPessoa();

        $model->save();
        return Funcoes::retornarOk();
    }

    // private function Incluir(Cliente $cliente)
    // {
    //     DB::table('cliente')->insert([
    //         'codigo' => $cliente->getCodigo(),
    //         'nome' => $cliente->getNome(),
    //         'bairro' => $cliente->getBairro(),
    //         'cep' => $cliente->getCep(),
    //         'cnpj' => $cliente->getCnpj(),
    //         'email' => $cliente->getEmail(),
    //         'endereco' => $cliente->getEndereco(),
    //         'fax' => $cliente->getFax(),
    //         'insc_Estadual' => $cliente->getInscricaoEstadual(),
    //         'nome_Cidade' => $cliente->getNomeCidade(),
    //         'obs' => $cliente->getObs(),
    //         'uf' => $cliente->getUf(),
    //         'complemento' => $cliente->getComplemento(),
    //         'cpf' => $cliente->getCpf(),
    //         'data_Cadastro' => $cliente->getDataCadastro(),
    //         'fantasia' => $cliente->getFantasia(),
    //         'fone' => $cliente->getFone(),
    //         'numero' => $cliente->getNumero(),
    //         'rg' => $cliente->getRg(),
    //         'tipo_Pessoa' => $cliente->getTipoPessoa()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}