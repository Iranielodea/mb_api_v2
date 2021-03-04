<?php

namespace App\Servicos;

use App\Entidades\ContaBanco;
use App\interfaces\ContaBancoRepositorioInterface;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContaBancoServico
{
    private $repositorio;

    public function __construct(ContaBancoRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {    
        $lista = $request->all();
        $resultado = '';
        try
        {
            foreach($lista as &$item)
            {
                $model = new ContaBanco($item['id'], $item['codigo'], $item['numConta'], $item['agencia'], 
                    $item['nomeBanco'], $item['ativo'], $item['cnpjCpf']);

                $resultado = $this->repositorio->salvar($model);
            }
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = Funcoes::retornarErro().$ex->getMessage();
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}