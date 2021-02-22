<?php

namespace App\Repositorios;

use App\Entidades\Transportadora;
use App\Interfaces\TransportadoraRepositorioInterface;
use App\Models\TransportadoraModel;

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
        if ($codigo > 0)
            $model = $this->model->where('codigo', '=', $codigo)->first();
        
            if ($model == null)
            $model = $this->model;

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

        return $model->save();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}