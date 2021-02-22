<?php

namespace App\Servicos;

use App\Entidades\Usuario;
use App\interfaces\UsuarioRepositorioInterface;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioServico
{
    private $repositorio;

    public function __construct(UsuarioRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {
        try
        {
            $lista = $request->all();
            foreach($lista as $item)
            {   
                $mensagem = "";
                if (empty($item['username']))
                    $mensagem = "Informe o UserName\n";
        
                if (empty($item['senha']))
                    $mensagem = $mensagem ."Informe a Senha";                

                if (!empty($mensagem) )
                    throw new Exception($mensagem);

                $model = new Usuario($item['id'], $item['codigo'], $item['username'], $item['senha']);
                
                $resultado = $this->repositorio->salvar($model);
            }
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = array("retorno" => "ERRO", "mensagem" => $ex->getMessage());
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}