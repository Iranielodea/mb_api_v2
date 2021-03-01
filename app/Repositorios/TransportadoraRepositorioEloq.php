<?php

namespace App\Repositorios;

use App\Entidades\Transportadora;
use App\Interfaces\TransportadoraRepositorioInterface;
use App\Models\TransportadoraModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

class TransportadoraRepositorioEloq implements TransportadoraRepositorioInterface
{
    private $model;

    public function __construct(TransportadoraModel $transportadoraModel)
    {
        $this->model = $transportadoraModel;    
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

    public function salvar(Transportadora $transportadora)
    {
        $codigo = $transportadora->getCodigo();
        $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = new TransportadoraModel();

        $model->codigo = $transportadora->getCodigo();
        $model->nome = $transportadora->getNome();
        $model->bairro = $transportadora->getBairro();
        $model->cep = $transportadora->getCep();
        $model->cnpj = $transportadora->getCnpj();
        $model->email = $transportadora->getEmail();
        $model->endereco = $transportadora->getEndereco();
        $model->fax = $transportadora->getFax();
        $model->insc_Estadual = $transportadora->getInscricaoEstadual();
        $model->nome_Cidade = $transportadora->getNomeCidade();
        $model->obs = $transportadora->getObs();
        $model->uf = $transportadora->getUf();
        $model->cpf_transp = $transportadora->getCpfTrans();
        $model->fone1 = $transportadora->getFone1();
        $model->fone2 = $transportadora->getFone2();
        $model->ddd = $transportadora->getDDD();
        $model->contato = $transportadora->getContato();
        $model->num_banco = $transportadora->getNumBanco();
        $model->nome_banco = $transportadora->getNomeBanco();
        $model->nome_agencia = $transportadora->getNumAgencia();
        $model->num_conta = $transportadora->getNumConta();
        $model->titular = $transportadora->getTitular();
        
        $model->save();
        return Funcoes::retornarOk();
    }

    // private function incluir(Transportadora $transportadora)
    // {
    //     DB::table('transportadora')->insert([
    //         'codigo' => $transportadora->getCodigo(),
    //         'nome' => $transportadora->getNome(),
    //         'bairro' => $transportadora->getBairro(),
    //         'cep' => $transportadora->getCep(),
    //         'cnpj' => $transportadora->getCnpj(),
    //         'email' => $transportadora->getEmail(),
    //         'endereco' => $transportadora->getEndereco(),
    //         'fax' => $transportadora->getFax(),
    //         'insc_Estadual' => $transportadora->getInscricaoEstadual(),
    //         'nome_Cidade' => $transportadora->getNomeCidade(),
    //         'obs' => $transportadora->getObs(),
    //         'uf' => $transportadora->getUf(),
    //         'cpf_transp' => $transportadora->getCpfTrans(),
    //         'fone1' => $transportadora->getFone1(),
    //         'fone2' => $transportadora->getFone2(),
    //         'ddd' => $transportadora->getDDD(),
    //         'contato' => $transportadora->getContato(),
    //         'num_banco' => $transportadora->getNumBanco(),
    //         'nome_banco' => $transportadora->getNomeBanco(),
    //         'nome_agencia' => $transportadora->getNumAgencia(),
    //         'num_conta' => $transportadora->getNumConta(),
    //         'titular' => $transportadora->getTitular()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}