<?php

namespace App\Repositorios;

use App\Entidades\Pedido;
use App\interfaces\PedidoRepositorioInterface;
use App\Models\PedidoModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

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
        $model = $this->model->where('num_pedido', '=', $numPedido)->first();

        if ($model == null)
            $model = new PedidoModel();

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
        
        $model->save();
        return Funcoes::retornarOk();
    }

    // private function incluir(Pedido $pedido)
    // {
    //     DB::table('pedido')->insert([
    //         'num_pedido' => $pedido->getNumPedido(),
    //         'nome_cliente' => $pedido->getNomeCliente(),
    //         'data' => $pedido->getData(),
    //         'total_bruto' => $pedido->getTotalBruto(),
    //         'perc_desconto' => $pedido->getPercDesconto(),
    //         'valor_desconto' => $pedido->getValorDesconto(),
    //         'total_liquido' => $pedido->getTotalLiquido(),
    //         'situacao' => $pedido->getSituacao(),
    //         'nome_fornecedor' => $pedido->getNomeFornecedor(),
    //         'obs' => $pedido->getObs(),
    //         'nome_contato' => $pedido->getNomeContato(),
    //         'perc_comissao' => $pedido->getPercComissao(),
    //         'encerrado' => $pedido->getEncerrado(),
    //         'total_venda' => $pedido->getTotalVenda(),
    //         'total_lucro' => $pedido->getTotalLucro(),
    //         'total_qtde' => $pedido->getTotalQtde(),
    //         'num_carga' => $pedido->getNumCarga(),
    //         'valor_lucro' => $pedido->getValorLucro(),
    //         'nome_vendedor' => $pedido->getNomeVendedor(),
    //         'valor_comissao' => $pedido->getValorComissao(),
    //         'total_comissao' => $pedido->getTotalComissao(),
    //         'nome_usina' => $pedido->getNomeUsina()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}