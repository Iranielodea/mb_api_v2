<?php

namespace App\repositorios;

use App\Entidades\Conta;
use App\interfaces\ContaRepositorioInterface;
use App\Models\ContaModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

class ContaRepositorioEloq implements ContaRepositorioInterface
{
    private $model;

    public function __construct(ContaModel $contaModel)
    {
        $this->model = $contaModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorCodigo($codigo)
    {
        return $this->model->where('codigo', '=', $codigo)->first();
    }

    public function salvar(Conta $conta)
    {
        $codigo = $conta->getCodigo();
        $model = $this->obterPorCodigo($codigo);

        if ($model == null)
            $model = new ContaModel();
        
        $model->codigo = $conta->getCodigo();
        $model->num_pedido = $conta->getNumPedido();
        $model->nome_cliente = $conta->getNomeCliente();
        $model->nome_fornecedor = $conta->getNomeFornecedor();
        $model->data_emissao = $conta->getDataEmissao();
        $model->valor_pagar = $conta->getValorPagar();
        $model->data_vencto = $conta->getDataVencto();
        $model->dias = $conta->getDias();
        $model->data_pago = $conta->getDataPago();
        $model->valor_pago = $conta->getValorPago();
        $model->seq_conta = $conta->getSeqConta();
        $model->valor_original = $conta->getValorOriginal();
        $model->tipo_conta = $conta->getTipoConta();
        $model->situacao = $conta->getSituacao();
        $model->documento = $conta->getDocumento();
        $model->nome_forma_pagto = $conta->getNomeFormaPagto();
        $model->banco_id = $conta->getContaBancoId();
        $model->pedido_id = $conta->getPedidoId();
        
        $model->save();
        return Funcoes::retornarOk();
    }

    // private function incluir(Conta $conta)
    // {
    //     DB::table('conta')->insert([
    //         'codigo' => $conta->getCodigo(),
    //         'num_pedido' => $conta->getNumPedido(),
    //         'nome_cliente' => $conta->getNomeCliente(),
    //         'nome_fornecedor' => $conta->getNomeFornecedor(),
    //         'data_emissao' => $conta->getDataEmissao(),
    //         'valor_pagar' => $conta->getValorPagar(),
    //         'data_vencto' => $conta->getDataVencto(),
    //         'dias' => $conta->getDias(),
    //         'data_pago' => $conta->getDataPago(),
    //         'valor_pago' => $conta->getValorPago(),
    //         'seq_conta' => $conta->getSeqConta(),
    //         'valor_original' => $conta->getValorOriginal(),
    //         'tipo_conta' => $conta->getTipoConta(),
    //         'situacao' => $conta->getSituacao(),
    //         'documento' => $conta->getDocumento(),
    //         'nome_forma_pagto' => $conta->getNomeFormaPagto(),
    //         'banco_id' => $conta->getContaBancoId(),
    //         'pedido_id' => $conta->getPedidoId()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}