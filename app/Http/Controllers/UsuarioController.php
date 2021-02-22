<?php

namespace App\Http\Controllers;

use App\interfaces\UsuarioRepositorioInterface;
use App\Servicos\UsuarioServico;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    //http://www.irasoft.com.br/teste/index.php/usuario
    
    private $repositorio;
    private $servico;

    public function __construct(UsuarioRepositorioInterface $repositorio, UsuarioServico $servico)
    {
        $this->repositorio = $repositorio;    
        $this->servico = $servico;
    }
    public function listar(Request $request)
    {
        try
        {
            $campo = $request->query("campo", "username");
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

    public function obterPorUserName(string $userName)
    {
        return $this->repositorio->obterPorUserName($userName);
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