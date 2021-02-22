<?php

namespace App\Repositorios;

use App\Entidades\PedidoItem;
use App\interfaces\PedidoItemRepositorioInterface;
use App\Models\PedidoItemModel;

class PedidoItemRepositorioEloq implements PedidoItemRepositorioInterface
{
    private $model;

    public function __construct(PedidoItemModel $pedidoModel)
    {
        $this->model = $pedidoModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorItem(int $numeroPedido, int $codProduto, int $seq)
    {
        return $this->model->where('num_pedido', '=', $numeroPedido)
            ->where('cod_produto', '=', $codProduto)
            ->where('seq', '=', $seq)->first();
    }

    public function salvar(PedidoItem $pedidoItem)
    {
        $numPedido = $pedidoItem->getNumPedido();
        $codProduto = $pedidoItem->getCodProduto();
        $seq = $pedidoItem->getSeq();
        
        if ($numPedido > 0)
            $model = $this->model->obterPorItem($numPedido, $codProduto, $seq);

        if ($model == null)
            $model = $this->model;

        $model->num_pedido = $pedidoItem->getNumPedido();
        $model->cod_produto = $pedidoItem->getCodProduto();
        $model->nome_produto = $pedidoItem->getNomeProduto();
        $model->seq = $pedidoItem->getSeq();
        $model->qtde = $pedidoItem->getQtde();
        $model->valor = $pedidoItem->getValor();
        $model->valor_total = $pedidoItem->getValorTotal();
        $model->sigla_un = $pedidoItem->getSiglaUn();
        $model->preco_venda = $pedidoItem->getPrecoVenda();
        $model->valor_lucro = $pedidoItem->getValorLucro();
        $model->total_lucro = $pedidoItem->getTotalLucro();
        $model->total_venda = $pedidoItem->getTotalVenda();
        
        return $model->save();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}