<?php

namespace App\Servicos;

use App\Entidades\Cliente;
use App\Entidades\Transportadora;
use App\interfaces\TransportadoraRepositorioInterface;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportadoraServico
{
    private $repositorio;

    public function __construct(TransportadoraRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function salvar(Request $request)
    {    
        try
        {
            $resultado = '';
            $lista = $request->all();
            
            foreach($lista as $item)
            {
                if (empty($request->nome))
                    throw new Exception("Informe o Nome da Transportadora");

                $model = new Transportadora($item['id'], $item['codigo'], $item['nome'], $item['bairro'], 
                    $item['cep'], $item['cnpj'], $item['email'], $item['endereco'], $item['fax'], 
                    $item['inscEstadual'], $item['nomeCidade'], $item['obs'], $item['uf'], $item['cpfTransp'], 
                    $item['fone1'], $item['fone2'], $item['ddd'], $item['contato'], $item['numBanco'], 
                    $item['nomeBanco'], $item['numAgencia'], $item['numConta'], $item['titular']);
                    
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