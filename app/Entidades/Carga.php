<?php

namespace App\Entidades;

class Carga
{
    private $id;
    private $codigo;
    private $nomeCliente;
    private $nomeContato;
    private $numPedido;
    private $numCarga;
    private $letra;
    private $data;
    private $visto;
    private $qtde;
    private $valorPedido;
    private $valorCarrega;
    private $valorFrete;
    private $nomeFornecedor;
    private $nomeMotorista;
    private $qtdePedido;
    private $placa;
    private $obs;
    private $situacao;
    private $financeiro;
    private $complemento;
    private $contatoIndicacao;
    private $saldo;
    private $armazen;
    private $unidade;
    private $complUnidade;
    private $obs2;
    private $numNf;
    private $dataNf;
    private $nomeManifesto;
    private $nomeAgencia;
    private $qtdeCada;
    private $siglaUnidade;
    private $agenciaBanco;
    private $cnpjCpf;
    private $creditoNf;
    private $numNota2;
    private $ir;
    private $ValorNota2;
    private $nomeUsina;
    private $codCliente;
    private $codFor;
    private $codContato;
    private $codMotorista;
    private $codManifesto;
    private $idUnidade;
    private $idContaBanco;
    private $codUsina;

    public function __construct($id, $codigo, $nomeCliente, $nomeContato, $numPedido, $numCarga, $letra,
        $data, $visto, $qtde, $valorPedido, $valorCarrega, $valorFrete, $nomeFornecedor, $nomeMotorista,
        $qtdePedido, $placa, $obs, $situacao, $financeiro, $complemento, $contatoIndicacao, $saldo,
        $armazen, $unidade, $complUnidade, $obs2, $numNf, $dataNf, $nomeManifesto, $qtdeCada,
        $siglaUnidade, $agenciaBanco, $cnpjCpf, $creditoNf, $numNota2, $ir, $valorNota2, $nomeUsina, $nomeAgencia,
        $codCliente, $codFor, $codContato, $codMotorista, $codManifesto, $idUnidade, $idContaBanco, $codUsina)
    {
        $this->setId($id);
        $this->setCodigo($codigo);
        $this->setNomeCliente($nomeCliente);
        $this->setNomeContato($nomeContato);
        $this->setNumPedido($numPedido);
        $this->setNumCarga($numCarga);
        $this->setLetra($letra);
        $this->setData($data);
        $this->setVisto($visto);
        $this->setQtde($qtde);
        $this->setValorPedido($valorPedido);
        $this->setValorCarrega($valorCarrega);
        $this->setValorFrete($valorFrete);
        $this->setNomeFornecedor($nomeFornecedor);
        $this->setNomeMotorista($nomeMotorista);
        $this->setQtdePedido($qtdePedido);
        $this->setPlaca($placa);
        $this->setObs($obs);
        $this->setSituacao($situacao);
        $this->setFinanceiro($financeiro);
        $this->setComplemento($complemento);
        $this->setContatoIndicacao($contatoIndicacao);
        $this->setSaldo($saldo);
        $this->setArmazen($armazen);
        $this->setUnidade($unidade);
        $this->setComplUnidade($complUnidade);
        $this->setObs2($obs2);
        $this->setNumNf($numNf);
        $this->setDataNf($dataNf);
        $this->setNomeManifesto($nomeManifesto);
        $this->setQtdeCada($qtdeCada);
        $this->setSiglaUnidade($siglaUnidade);
        $this->setAgenciaBanco($agenciaBanco);
        $this->setCnpjCpf($cnpjCpf);
        $this->setCreditoNf($creditoNf);
        $this->setNumNota2($numNota2);
        $this->setIr($ir);
        $this->setValorNota2($valorNota2);
        $this->setNomeUsina($nomeUsina);
        $this->setNomeAgencia($nomeAgencia);
        $this->setCodCliente($codCliente);
        $this->setCodFor($codFor);
        $this->setCodContato($codContato);
        $this->setCodMotorista($codMotorista);
        $this->setCodManifesto($codManifesto);
        $this->setIdUnidade($idUnidade);
        $this->setIdContaBanco($idContaBanco);
        $this->setCodUsina($codUsina);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($value)
    {
        $this->nomeCliente = $value;
    }

    public function getNomeContato()
    {
        return $this->nomeContato;
    }

    public function setNomeContato($value)
    {
        $this->nomeContato = $value;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($value)
    {
        $this->numPedido = $value;
    }

    public function getNumCarga()
    {
        return $this->numCarga;
    }

    public function setNumCarga($value)
    {
        $this->numCarga = $value;
    }

    public function getLetra()
    {
        return $this->letra;
    }

    public function setLetra($value)
    {
        $this->letra = $value;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($value)
    {
        $this->data = $value;
    }

    public function getVisto()
    {
        return $this->visto;
    }

    public function setVisto($value)
    {
        $this->visto = $value;
    }

    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($value)
    {
        $this->qtde = $value;
    }

    public function getValorPedido()
    {
        return $this->valorPedido;
    }

    public function setValorPedido($value)
    {
        $this->valorPedido = $value;
    }

    public function getValorCarrega()
    {
        return $this->valorCarrega;
    }

    public function setValorCarrega($value)
    {
        $this->valorCarrega = $value;
    }

    public function getValorFrete()
    {
        return $this->valorFrete;
    }

    public function setValorFrete($value)
    {
        $this->valorFrete = $value;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($value)
    {
        $this->nomeFornecedor = $value;
    }

    public function getNomeMotorista()
    {
        return $this->nomeMotorista;
    }

    public function setNomeMotorista($value)
    {
        $this->nomeMotorista = $value;
    }

    public function getQtdePedido()
    {
        return $this->qtdePedido;
    }

    public function setQtdePedido($value)
    {
        $this->qtdePedido= $value;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($value)
    {
        $this->placa = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($value)
    {
        $this->situacao = $value;
    }

    public function getFinanceiro()
    {
        return $this->financeiro;
    }

    public function setFinanceiro($value)
    {
        $this->financeiro = $value;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($value)
    {
        $this->complemento = $value;
    }

    public function getContatoIndicacao()
    {
        return $this->contatoIndicacao;
    }

    public function setContatoIndicacao($value)
    {
        $this->contatoIndicacao = $value;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($value)
    {
        $this->saldo = $value;
    }

    public function getArmazen()
    {
        return $this->armazen;
    }

    public function setArmazen($value)
    {
        $this->armazen = $value;
    }

    public function getUnidade()
    {
        return $this->unidade;
    }

    public function setUnidade($value)
    {
        $this->unidade = $value;
    }

    public function getComplUnidade()
    {
        return $this->complUnidade;
    }

    public function setComplUnidade($value)
    {
        $this->complUnidade = $value;
    }

    public function getObs2()
    {
        return $this->obs2;
    }

    public function setObs2($value)
    {
        $this->obs2 = $value;
    }

    public function getNumNf()
    {
        return $this->numNf;
    }

    public function setNumNf($value)
    {
        $this->numNf = $value;
    }

    public function getDataNf()
    {
        return $this->dataNf;
    }

    public function setDataNf($value)
    {
        $this->dataNf = $value;
    }

    public function getNomeManifesto()
    {
        return $this->nomeManifesto;
    }

    public function setNomeManifesto($value)
    {
        $this->nomeManifesto = $value;
    }

    public function getQtdeCada()
    {
        return $this->qtdeCada;
    }

    public function setQtdeCada($value)
    {
        $this->qtdeCada = $value;
    }

    public function getSiglaUnidade()
    {
        return $this->siglaUnidade;
    }

    public function setSiglaUnidade($value)
    {
        $this->siglaUnidade = $value;
    }

    public function getAgenciaBanco()
    {
        return $this->agenciaBanco;
    }

    public function setAgenciaBanco($value)
    {
        $this->agenciaBanco = $value;
    }

    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    public function setCnpjCpf($value)
    {
        $this->cnpjCpf = $value;
    }

    public function getCreditoNf()
    {
        return $this->creditoNf;
    }

    public function setCreditoNf($value)
    {
        $this->creditoNf = $value;
    }

    public function getNumNota2()
    {
        return $this->numNota2;
    }

    public function setNumNota2($value)
    {
        $this->numNota2 = $value;
    }

    public function getIr()
    {
        return $this->ir;
    }

    public function setIr($value)
    {
        $this->ir = $value;
    }

    public function getValorNota2()
    {
        return $this->ValorNota2;
    }

    public function setValorNota2($value)
    {
        $this->ValorNota2 = $value;
    }

    public function getNomeUsina()
    {
        return $this->nomeUsina;
    }

    public function setNomeUsina($value)
    {
        $this->nomeUsina = $value;
    }

    public function getNomeAgencia()
    {
        return $this->nomeAgencia;
    }

    public function setNomeAgencia($value)
    {
        $this->nomeAgencia = $value;
    }

    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }

    public function getCodFor()
    {
        return $this->codFor;
    }

    public function setCodFor($codFor)
    {
        $this->codFor = $codFor;
    }

    public function getCodContato()
    {
        return $this->codContato;
    }

    public function setCodContato($codContato)
    {
        $this->codContato = $codContato;
    }

    public function getCodMotorista()
    {
        return $this->codMotorista;
    }

    public function setCodMotorista($codMotorista)
    {
        $this->codMotorista = $codMotorista;
    }

    public function getCodManifesto()
    {
        return $this->codManifesto;
    }

    public function setCodManifesto($codManifesto)
    {
        $this->codManifesto = $codManifesto;
    }

    public function getIdUnidade()
    {
        return $this->idUnidade;
    }

    public function setIdUnidade($idUnidade)
    {
        $this->idUnidade = $idUnidade;
    }

    public function getIdContaBanco()
    {
        return $this->idContaBanco;
    }

    public function setIdContaBanco($idContaBanco)
    {
        $this->idContaBanco = $idContaBanco;
    }

    public function getCodUsina()
    {
        return $this->codUsina;
    }

    public function setCodUsina($codUsina)
    {
        $this->codUsina = $codUsina;
    }
}