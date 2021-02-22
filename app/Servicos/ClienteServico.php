<?php

namespace App\Servicos;

use App\Entidades\Cliente;
use App\interfaces\ClienteRepositorioInterface;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteServico
{
    private $repositorio;

    public function __construct(ClienteRepositorioInterface $repositorio)
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
                    throw new Exception("Informe o Nome do Cliente");

                $model = new Cliente($item['id'], $item['codigo'], $item['nome'], $item['bairro'], 
                    $item['cep'], $item['cnpj'], $item['email'], $item['endereco'], $item['fax'], 
                    $item['inscEstadual'], $item['nomeCidade'], $item['obs'], $item['uf'], 
                    $item['complemento'], $item['cpf'], $item['dataCadastro'], $item['fantasia'], 
                    $item['fone'], $item['numero'], $item['rg'], $item['tipoPessoa']);
                    
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