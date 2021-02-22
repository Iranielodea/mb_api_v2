<?php

namespace App\Http\Controllers;

/*
Código	Nome	Descrição
200	OK	O recurso solicitado foi processado e retornado com sucesso.
201	Created	O recurso informado foi criado com sucesso.
401	Unauthorized	A chave da API está desativada, incorreta ou não foi informada corretamente. Consulte a seção sobre autenticação da documentação.
402	Payment Required	A chave da API está correta, porém a conta foi bloqueada por inadimplência. Neste caso, acesse o painel para verificar as pendências.
403	Forbidden	O acesso ao recurso não foi autorizado. Este erro por ocorrer por dois motivos: (1) Uma conexão sem criptografia foi iniciada. Neste caso utilize sempre HTTPS. (2) As configurações de perfil de acesso não permitem a ação desejada. Consulte as configurações de acesso no painel de administração.
404	Not Found	O recurso solicitado ou o endpoint não foi encontrado.
406	Not Acceptable	O formato enviado não é aceito. O cabeçalho Content-Type da requisição deve contar obrigatoriamente o valor application/json para requisições do tipo POST e PUT.
422	Unprocessable Entity	A requisição foi recebida com sucesso, porém contém parâmetros inválidos. Para mais detalhes, verifique o atributo errors no corpo da resposta.
429	Too Many Requests	O limite de requisições foi atingido. Verifique o cabeçalho Retry-After para obter o tempo de espera (em segundos) necessário para a retentativa.
400	Bad Request	Não foi possível interpretar a requisição. Verifique a sintaxe das informações enviadas.
500	Internal Server Error	Ocorreu uma falha na plataforma Vindi. Por favor, entre em contato com o atendimento.
*/

use App\interfaces\GrupoRepositorioInterface;
use App\Servicos\GrupoServico;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrupoController extends Controller
{
    private $repositorio;
    private $servico;

    public function __construct(GrupoRepositorioInterface $repositorio, GrupoServico $servico)
    {
        $this->repositorio = $repositorio;    
        $this->servico = $servico;
    }
    public function listar(Request $request)
    {
        try
        {
            $campo = $request->query("campo", "nome");
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