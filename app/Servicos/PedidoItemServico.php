<?php

namespace App\Servicos;

use App\Entidades\PedidoItem;
use App\interfaces\PedidoItemRepositorioInterface;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidoItemServico
{
    private $repositorio;

    public function __construct(PedidoItemRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {    
        $retorno = "";
        try
        {
            $lista = $request->all();
            $resultado = '';

            foreach ($lista as $item) 
            {
                $model = new PedidoItem($item['id'], $item['numPedido'], $item['codProduto'], 
                    $item['nomeProduto'], $item['seq'], $item['qtde'], $item['valor'],
                    $item['valorTotal'], $item['siglaUn'], $item['precoVenda'], $item['valorLucro'], 
                    $item['totalLucro'], $item['totalVenda']);
                    
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