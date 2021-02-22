<?php

namespace App\Http\Controllers;

use App\interfaces\PedidoRepositorioInterface;
use App\Servicos\PedidoServico;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidoController extends Controller
{
    private $repositorio;
    private $servico;

    public function __construct(PedidoRepositorioInterface $repositorio, PedidoServico $servico)
    {
        $this->repositorio = $repositorio;
        $this->servico = $servico;
    }

    public function listar(Request $request)
    {
        try
        {
            $campo = $request->query("campo", "nome_cliente");
            $valor = $request->query("valor", "");

            $resultado = $this->repositorio->filtrar($campo, $valor);
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }

    public function obterPorId(int $id)
    {
        try
        {
            $resultado = $this->repositorio->obterPorId($id);
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }

    public function obterPorNumeroPedido(int $numPedido)
    {
        try
        {
            $resultado = $this->repositorio->obterPorNumeroPedido($numPedido);
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }

    public function inserir(Request $request)
    {
        return $this->servico->salvar($request);
    }

    public function atualizar(Request $request)
    {        
        return $this->servico->salvar($request);
    }

    public function excluir(int $id)
    {
        try
        {
            $resultado = $this->repositorio->excluir($id);
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}