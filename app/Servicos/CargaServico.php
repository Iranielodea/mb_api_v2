<?php

namespace App\Servicos;

use App\Entidades\Carga;
use App\interfaces\CargaRepositorioInterface;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CargaServico
{
    private $repositorio;

    public function __construct(CargaRepositorioInterface $repositorio)
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
                $model = new Carga($item['id'], $item['codigo'], $item['nomeCliente'], $item['nomeContato'], 
                    $item['numPedido'], $item['numCarga'], $item['letra'], $item['data'], $item['visto'], 
                    $item['qtde'], $item['valorPedido'], $item['valorCarrega'], $item['valorFrete'], 
                    $item['nomeFornecedor'], $item['nomeMotorista'], $item['qtdePedido'], $item['placa'], 
                    $item['obs'], $item['situacao'], $item['financeiro'], $item['complemento'], 
                    $item['contatoIndicacao'], $item['saldo'], $item['armazen'], $item['unidade'], 
                    $item['complUnidade'], $item['obs2'], $item['numNf'], $item['dataNf'], 
                    $item['nomeManifesto'], $item['qtdeCada'], $item['siglaUnidade'], $item['agenciaBanco'], 
                    $item['cnpjCpf'], $item['creditoNf'], $item['numNota2'], $item['ir'], $item['valorNota2'], 
                    $item['nomeUsina'], $item['nomeAgencia'], $item['codCliente'], $item['codFor'], $item['codContato'],
                    $item['codMotorista'], $item['codManifesto'], $item['idUnidade'], $item['idContaBanco'],
                    $item['codUsina']);

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