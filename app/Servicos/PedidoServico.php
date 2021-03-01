<?php

namespace App\Servicos;

use App\Entidades\Pedido;
use App\interfaces\PedidoRepositorioInterface;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidoServico
{
    private $repositorio;

    public function __construct(PedidoRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {    
        $retorno = "";
        try
        {
            $resultado = "";
            $lista = $request->all();

            foreach($lista as $item)
            {                
                $model = new Pedido($item['id'], $item['numPedido'], $item['nomeCliente'], 
                    $item['data'], $item['totalBruto'], $item['percDesconto'], $item['valorDesconto'], 
                    $item['totalLiquido'], $item['situacao'], $item['nomeFornecedor'], 
                    $item['obs'], $item['nomeContato'], $item['percComissao'], $item['encerrado'], 
                    $item['totalVenda'], $item['totalLucro'], $item['totalQtde'], $item['numCarga'], 
                    $item['valorLucro'], $item['nomeVendedor'], $item['valorComissao'], 
                    $item['totalComissao'], $item['nomeUsina']);
                    
                $resultado = $this->repositorio->salvar($model);
            }

            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = Funcoes::retornarErro(). $ex->getMessage();
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}