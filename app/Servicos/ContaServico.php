<?php

namespace App\Servicos;

use App\Entidades\Conta;
use App\interfaces\ContaBancoRepositorioInterface;
use App\interfaces\ContaRepositorioInterface;
use App\Shared\Funcoes;
use Exception;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Response;

class ContaServico
{
    private $repositorio;
    private $repositorioContaBanco;

    public function __construct(ContaRepositorioInterface $repositorio, 
        ContaBancoRepositorioInterface $repositorioContaBanco)
    {
        $this->repositorio = $repositorio;
        $this->repositorioContaBanco = $repositorioContaBanco;
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
                $codigoContaBanco = null;
                if (!empty($item['contaBancoId']))
                {
                    $contaBanco = $this->repositorioContaBanco->obterPorCodigo($item['contaBancoId']);
                    if ($contaBanco != null)
                        $codigoContaBanco = $contaBanco->codigo;
                }     

                $model = new Conta($item['id'], $item['codigo'], $item['numPedido'], $item['nomeCliente'], 
                    $item['nomeFornecedor'], $item['dataEmissao'], $item['valorPagar'], $item['dataVencto'], 
                    $item['dias'], $item['dataPago'], $item['valorPago'], $item['seqConta'], $item['valorOriginal'], 
                    $item['tipoConta'], $item['situacao'], $item['documento'], $item['nomeFormaPagto'], 
                    $codigoContaBanco, $item['pedidoId']);

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