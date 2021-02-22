<?php

namespace App\Repositorios;

use App\Entidades\Pedido;
use App\interfaces\PedidoRepositorioInterface;
use App\Models\PedidoModel;

class PedidoRepositorioEloq implements PedidoRepositorioInterface
{
    private $model;

    public function __construct(PedidoModel $pedidoModel)
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

    public function obterPorNumeroPedido(int $numero)
    {
        return $this->model->where('num_pedido', '=', $numero)->first();
    }

    public function salvar(Pedido $pedido)
    {
        $numPedido = $pedido->getNumPedido();
        if ($numPedido > 0)
            $model = $this->model->where('num_pedido', '=', $numPedido)->first();

        if ($model == null)
            $model = $this->model;

        $model->num_pedido = $pedido->getNumPedido();
        $model->nome_cliente = $pedido->getNomeCliente();
        $model->data = $pedido->getData();
        $model->total_bruto = $pedido->getTotalBruto();
        $model->perc_desconto = $pedido->getPercDesconto();
        $model->valor_desconto = $pedido->getValorDesconto();
        $model->total_liquido = $pedido->getTotalLiquido();
        $model->situacao = $pedido->getSituacao();
        $model->nome_fornecedor = $pedido->getNomeFornecedor();
        $model->obs = $pedido->getObs();
        $model->nome_contato = $pedido->getNomeContato();
        $model->perc_comissao = $pedido->getPercComissao();
        $model->encerrado = $pedido->getEncerrado();
        $model->total_venda = $pedido->getTotalVenda();
        $model->total_lucro = $pedido->getTotalLucro();
        $model->total_qtde = $pedido->getTotalQtde();
        $model->num_carga = $pedido->getNumCarga();
        $model->valor_lucro = $pedido->getValorLucro();
        $model->nome_vendedor = $pedido->getNomeVendedor();
        $model->valor_comissao = $pedido->getValorComissao();
        $model->total_comissao = $pedido->getTotalComissao();
        $model->nome_usina = $pedido->getNomeUsina();
        
        

        return $model->save();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}