<?php

namespace App\Http\Controllers;

use App\interfaces\CargaRepositorioInterface;
use App\Servicos\CargaServico;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CargaController extends Controller
{
    private $repositorio;
    private $servico;

    public function __construct(CargaRepositorioInterface $repositorio, CargaServico $servico)
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