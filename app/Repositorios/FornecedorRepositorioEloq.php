<?php

namespace App\Repositorios;

use App\Entidades\Fornecedor;
use App\Interfaces\FornecedorRepositorioInterface;
use App\Models\FornecedorModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

class FornecedorRepositorioEloq implements FornecedorRepositorioInterface
{
    private $model;

    public function __construct(FornecedorModel $fornecedorModel)
    {
        $this->model = $fornecedorModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorCodigo($codigo)
    {
        return $this->model->where('codigo', '=', $codigo)->first();
    }

    public function salvar(Fornecedor $fornecedor)
    {
        $codigo = $fornecedor->getCodigo();
        $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = new FornecedorModel();

        return $this->persistir($fornecedor, $model);
    }

    public function incluir(Fornecedor $fornecedor)
    {        
        $model = new FornecedorModel();
        return $this->persistir($fornecedor, $model);      
    }

    private function persistir(Fornecedor $fornecedor, FornecedorModel $model)
    {        
        $model->codigo = $fornecedor->getCodigo();
        $model->nome = $fornecedor->getNome();
        $model->bairro = $fornecedor->getBairro();
        $model->cep = $fornecedor->getCep();
        $model->cnpj = $fornecedor->getCnpj();
        $model->email = $fornecedor->getEmail();
        $model->endereco = $fornecedor->getEndereco();
        $model->fax = $fornecedor->getFax();
        $model->ie = $fornecedor->getInscricaoEstadual();
        $model->nome_Cidade = $fornecedor->getNomeCidade();
        $model->obs = $fornecedor->getObs();
        $model->uf = $fornecedor->getUf();
        $model->complemento = $fornecedor->getComplemento();
        $model->fantasia = $fornecedor->getFantasia();
        $model->fone = $fornecedor->getFone();
        $model->numero = $fornecedor->getNumero();

        $model->save();
        return Funcoes::retornarOk();
    }

    // private function Incluir(Cliente $fornecedor)
    // {
    //     DB::table('fornece$fornecedor')->insert([
    //         'codigo' => $fornecedor->getCodigo(),
    //         'nome' => $fornecedor->getNome(),
    //         'bairro' => $fornecedor->getBairro(),
    //         'cep' => $fornecedor->getCep(),
    //         'cnpj' => $fornecedor->getCnpj(),
    //         'email' => $fornecedor->getEmail(),
    //         'endereco' => $fornecedor->getEndereco(),
    //         'fax' => $fornecedor->getFax(),
    //         'insc_Estadual' => $fornecedor->getInscricaoEstadual(),
    //         'nome_Cidade' => $fornecedor->getNomeCidade(),
    //         'obs' => $fornecedor->getObs(),
    //         'uf' => $fornecedor->getUf(),
    //         'complemento' => $fornecedor->getComplemento(),
    //         'cpf' => $fornecedor->getCpf(),
    //         'data_Cadastro' => $fornecedor->getDataCadastro(),
    //         'fantasia' => $fornecedor->getFantasia(),
    //         'fone' => $fornecedor->getFone(),
    //         'numero' => $fornecedor->getNumero(),
    //         'rg' => $fornecedor->getRg(),
    //         'tipo_Pessoa' => $fornecedor->getTipoPessoa()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}