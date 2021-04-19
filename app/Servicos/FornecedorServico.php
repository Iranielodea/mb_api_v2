<?php

namespace App\Servicos;

use App\Entidades\Fornecedor;
use App\interfaces\FornecedorRepositorioInterface;
use App\Models\FornecedorModel;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FornecedorServico
{
    private $repositorio;

    public function __construct(FornecedorRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function incluir(Request $request)
    {
        return $this->salvarGeral($request, true);
    }

    public function salvar(Request $request)
    {
        return $this->salvarGeral($request, false);
    }

    private function salvarGeral(Request $request, bool $incluir)
    {            
        $lista = $request->all();
        try
        {
            $resultado = '';
            foreach($lista as $item)
            {
                if (empty($item['nome']))
                    throw new Exception("Informe o Nome do Fornecedor");

                $model = new Fornecedor($item['id'], $item['codigo'], $item['nome'], $item['bairro'], 
                    $item['cep'], $item['cnpj'], $item['email'], $item['endereco'], $item['fax'], 
                    $item['inscEstadual'], $item['nomeCidade'], $item['obs'], $item['uf'], 
                    $item['complemento'], $item['fantasia'], $item['fone'], $item['numero']);
                    
                if ($incluir)
                    $resultado = $this->repositorio->incluir($model);
                else
                    $resultado = $this->repositorio->salvar($model);
            }
            return response()->json($resultado, Response::HTTP_OK);
        }
        catch(Exception $ex)
        {
            $retorno = Funcoes::retornarErro(). $ex->getMessage();
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }
    }
}