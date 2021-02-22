<?php

namespace App\repositorios;

use App\Entidades\ContaBanco;
use App\interfaces\ContaBancoRepositorioInterface;
use App\Models\ContaBancoModel;

class ContaBancoRepositorioEloq implements ContaBancoRepositorioInterface
{
    private $model;

    public function __construct(ContaBancoModel $contaBancoModel)
    {
        $this->model = $contaBancoModel;
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
        return $this->model->where('codigo', '=', $codigo)->first();
    }
    public function salvar(ContaBanco $contaBanco)
    {
        $codigo = $contaBanco->getCodigo();
        if ($codigo > 0)
            $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = $this->model;
        
        $model->codigo = $contaBanco->getCodigo();
        $model->num_conta = $contaBanco->getNumConta();
        $model->agencia = $contaBanco->getAgencia();
        $model->nome_banco = $contaBanco->getNomeBanco();
        $model->ativo = $contaBanco->getAtivo();
        $model->cnpj_cpf = $contaBanco->getCnpjCpf();

        return $model->save();
    }
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}