<?php

namespace App\Http\Controllers;

use App\interfaces\FornecedorRepositorioInterface;
use App\Servicos\FornecedorServico;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FornecedorController extends Controller
{
    private $repositorio;
    private $servico;

    public function __construct(FornecedorRepositorioInterface $repositorio, FornecedorServico $servico)
    {
        $this->repositorio = $repositorio;
        $this->servico = $servico;
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

    public function inserirAlterar(Request $request)
    {
        return $this->servico->salvar($request);
    }

    public function incluir(Request $request)
    {
        return $this->servico->incluir($request);
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