<?php

namespace App\Servicos;

use App\Entidades\Grupo;
use App\interfaces\GrupoRepositorioInterface;
use App\Shared\Funcoes;
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
        $retorno = '';
        $lista = $request->all();
        try
        {
            foreach($lista as $item)
            {
                if (empty($item['nome']))
                    throw new Exception("Informe o Nome");

                $model = new Grupo($item['id'], $item['codigo'], $item['nome'], $item['ativo']);
                $retorno = $this->repositorio->salvar($model);
            }

            return response()->json($retorno, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = Funcoes::retornarErro(). $ex->getMessage();
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}