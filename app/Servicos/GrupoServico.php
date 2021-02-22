<?php

namespace App\Servicos;

use App\Entidades\Grupo;
use App\interfaces\GrupoRepositorioInterface;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrupoServico
{
    private $repositorio;

    public function __construct(GrupoRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {
        $lista = $request->all();
        try
        {
            foreach($lista as $item)
            {
                if (empty($item['nome']))
                    throw new Exception("Informe o Nome");

                $model = new Grupo($item['id'], $item['codigo'], $item['nome'], $item['ativo']);
                $this->repositorio->salvar($model);
            }

            // return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}