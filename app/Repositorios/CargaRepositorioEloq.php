<?php

namespace App\repositorios;

use App\Entidades\Carga;
use App\interfaces\CargaRepositorioInterface;
use App\Models\CargaModel;

class CargaRepositorioEloq implements CargaRepositorioInterface
{
    private $model;

    public function __construct(CargaModel $cargaModel)
    {
        $this->model = $cargaModel;
    }
    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }
    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }
    public function obterPorNumCarga(int $numCarga)
    {
        return $this->model->where('num_carga', '=', $numCarga)->first();
    }
    public function salvar(Carga $carga)
    {
        $codigo = $carga->getCodigo();
        if ($codigo > 0)
            $model = $this->model->where('codigo', '=', $codigo)->first();

        if ($model == null)
            $model = $this->model;
        
        $model->codigo = $carga->getCodigo();
        $model->nome_cliente = $carga->getNomeCliente();
        $model->nome_contato = $carga->getNomeContato();
        $model->num_pedido = $carga->getNumPedido();
        $model->num_carga = $carga->getNumCarga();
        $model->letra = $carga->getLetra();
        $model->data = $carga->getData();
        $model->visto = $carga->getVisto();
        $model->qtde = $carga->getQtde();
        $model->valor_pedido = $carga->getValorPedido();
        $model->valor_carrega = $carga->getValorCarrega();
        $model->valor_frete = $carga->getValorFrete();
        $model->nome_fornecedor = $carga->getNomeFornecedor();
        $model->nome_motorista = $carga->getNomeMotorista();
        $model->qtde_pedido = $carga->getQtdePedido();
        $model->placa = $carga->getPlaca();
        $model->obs = $carga->getObs();
        $model->obs2 = $carga->getObs2();
        $model->situacao = $carga->getSituacao();
        $model->financeiro = $carga->getFinanceiro();
        $model->complemento = $carga->getComplemento();
        $model->contato_indicacao = $carga->getContatoIndicacao();
        $model->saldo = $carga->getSaldo();
        $model->armazen = $carga->getArmazen();
        $model->unidade = $carga->getUnidade();
        $model->compl_unidade = $carga->getComplUnidade();
        $model->num_nf = $carga->getNumNf();
        $model->data_nf = $carga->getDataNf();
        $model->nome_manifesto = $carga->getNomeManifesto();
        $model->qtde_cada = $carga->getQtdeCada();
        $model->sigla_unidade = $carga->getSiglaUnidade();
        $model->agencia_banco = $carga->getAgenciaBanco();
        $model->cnpj_cpf = $carga->getCnpjCpf();
        $model->credito_nf = $carga->getCreditoNf();
        $model->num_nota2 = $carga->getNumNota2();
        $model->ir = $carga->getIr();
        $model->valor_nota2 = $carga->getValorNota2();
        $model->nome_usina = $carga->getNomeUsina();
        $model->nome_agencia = $carga->getNomeAgencia();

        return $model->save();

    }
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}