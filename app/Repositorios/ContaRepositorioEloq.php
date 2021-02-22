<?php

namespace App\repositorios;

use App\Entidades\Conta;
use App\interfaces\ContaRepositorioInterface;
use App\Models\ContaModel;

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
        if ($codigo > 0)
            $model = $this->obterPorCodigo($codigo);

        if ($model == null)
            $model = $this->model;

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

        return $model->save();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}