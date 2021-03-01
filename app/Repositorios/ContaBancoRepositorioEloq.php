<?php

namespace App\repositorios;

use App\Entidades\ContaBanco;
use App\interfaces\ContaBancoRepositorioInterface;
use App\Models\ContaBancoModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

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

    public function Salvar(ContaBanco $contaBanco)
    {
        $codigo = $contaBanco->getCodigo();
        $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = new ContaBancoModel();

        $model->codigo = $contaBanco->getCodigo();
        $model->num_conta = $contaBanco->getNumConta();
        $model->agencia = $contaBanco->getAgencia();
        $model->nome_banco = $contaBanco->getNomeBanco();
        $model->ativo = $contaBanco->getAtivo();
        $model->cnpj_cpf = $contaBanco->getCnpjCpf();
        
        $model->save();
        return Funcoes::retornarOk();
    }

    // private function incluir(ContaBanco $contaBanco)
    // {
    //     DB::table('conta_banco')->insert([
    //         'codigo' => $contaBanco->getCodigo(),
    //         'num_conta' => $contaBanco->getNumConta(),
    //         'agencia' => $contaBanco->getAgencia(),
    //         'nome_banco' => $contaBanco->getNomeBanco(),
    //         'ativo' => $contaBanco->getAtivo(),
    //         'cnpj_cpf' => $contaBanco->getCnpjCpf()
    //     ]);
    // }

    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}