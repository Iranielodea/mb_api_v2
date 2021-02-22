<?php

namespace App\Entidades;

class PedidoItem
{
    private $id;
    private $numPedido;
    private $codProduto;
    private $nomeProduto;
    private $seq;
    private $qtde;
    private $valor;
    private $valorTotal;
    private $siglaUn;
    private $precoVenda;
    private $valorLucro;
    private $totalLucro;
    private $totalVenda;

    public function __construct($id, $numPedido, $codProduto, $nomeProduto, $seq, $qtde, $valor,
        $valorTotal, $siglaUn, $precoVenda, $valorLucro, $totalLucro, $totalVenda)
    {
        $this->setId($id);
        $this->setNumPedido($numPedido);
        $this->setCodProduto($codProduto);
        $this->setNomeProduto($nomeProduto);
        $this->setSeq($seq);
        $this->setqtde($qtde);
        $this->setValor($valor);
        $this->setValorTotal($valorTotal);
        $this->setSiglaUn($siglaUn);
        $this->setPrecoVenda($precoVenda);
        $this->setValorLucro($valorLucro);
        $this->setTotalLucro($totalLucro);
        $this->setTotalVenda($totalVenda);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($value)
    {
        $this->numPedido = $value;
    }

    public function getCodProduto()
    {
        return $this->codProduto;
    }

    public function setCodProduto($value)
    {
        $this->codProduto = $value;
    }

    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    public function setNomeProduto($value)
    {
        $this->nomeProduto = $value;
    }

    public function getSeq()
    {
        return $this->seq;
    }

    public function setSeq($value)
    {
        $this->seq = $value;
    }

    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($value)
    {
        $this->qtde = $value;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($value)
    {
        $this->valor = $value;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($value)
    {
        $this->valorTotal = $value;
    }

    public function getSiglaUn()
    {
        return $this->siglaUn;
    }

    public function setSiglaUn($value)
    {
        $this->siglaUn = $value;
    }

    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }

    public function setPrecoVenda($value)
    {
        $this->precoVenda = $value;
    }

    public function getValorLucro()
    {
        return $this->valorLucro;
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getTotalLucro()
    {
        return $this->totalLucro;
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalVenda()
    {
        return $this->totalVenda;
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }
}
