<?php

namespace App\Repositorios;

use App\Entidades\PedidoItem;
use App\interfaces\PedidoItemRepositorioInterface;
use App\Models\PedidoItemModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

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

    public function obterPorItem($numeroPedido, $codProduto, $seq)
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
        
        // $model = $this->model->obterPorItem($numPedido, $codProduto, $seq);

        $model = $this->model->where('num_pedido', '=', $numPedido)
        ->where('cod_produto', '=', $codProduto)
        ->where('seq', '=', $seq)->first();

        if ($model == null)
            $model = new PedidoItemModel();

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
        
        $model->save();
        return Funcoes::retornarOk();
    }

    // private function incluir(PedidoItem $pedidoItem)
    // {
    //     DB::table('pedido_item')->insert([
    //         'num_pedido' => $pedidoItem->getNumPedido(),
    //         'cod_produto' => $pedidoItem->getCodProduto(),
    //         'nome_produto' => $pedidoItem->getNomeProduto(),
    //         'seq' => $pedidoItem->getSeq(),
    //         'qtde' => $pedidoItem->getQtde(),
    //         'valor' => $pedidoItem->getValor(),
    //         'valor_total' => $pedidoItem->getValorTotal(),
    //         'sigla_un' => $pedidoItem->getSiglaUn(),
    //         'preco_venda' => $pedidoItem->getPrecoVenda(),
    //         'valor_lucro' => $pedidoItem->getValorLucro(),
    //         'total_lucro' => $pedidoItem->getTotalLucro(),
    //         'total_venda' => $pedidoItem->getTotalVenda()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}