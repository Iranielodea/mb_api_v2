<?php

namespace App\Entidades;

class Pedido
{
    public $id;
    public $numPedido;
    public $nomeCliente;
    public $data;
    public $totalBruto;
    public $percDesconto;
    public $valorDesconto;
    public $totalLiquido;
    public $situacao;
    public $nomeFornecedor;
    public $obs;
    public $nomeContato;
    public $percComissao;
    public $encerrado;
    public $totalVenda;
    public $totalLucro;
    public $totalQtde;
    public $numCarga;
    public $valorLucro;
    public $nomeVendedor;
    public $valorComissao;
    public $totalComissao;
    public $nomeUsina;

    public function __construct($id, $numPedido, $nomeCliente, $data, $totalBruto, $percDesconto, 
        $valorDesconto, $totalLiquido, $situacao, $nomeFornecedor, $obs, $nomeContato, $percComissao, 
        $encerrado, $totalVenda, $totalLucro, $totalQtde, $numCarga, $valorLucro, $nomeVendedor, 
        $valorComissao, $totalComissao, $nomeUsina)
    {
        $this->setId($id);
        $this->setNumPedido($numPedido);
        $this->setNomeCliente($nomeCliente);
        $this->setData($data);
        $this->setTotalBruto($totalBruto);
        $this->setPercDesconto($percDesconto);
        $this->setValorDesconto($valorDesconto);
        $this->setTotalLiquido($totalLiquido);
        $this->setSituacao($situacao);
        $this->setNomeFornecedor($nomeFornecedor);
        $this->setObs($obs);
        $this->setNomeContato($nomeContato);
        $this->setPercComissao($percComissao);
        $this->setEncerrado($encerrado);
        $this->setTotalVenda($totalVenda);
        $this->setTotalLucro($totalLucro);
        $this->setTotalQtde($totalQtde);
        $this->setNumCarga($numCarga);
        $this->setValorLucro($valorLucro);
        $this->setNomeVendedor($nomeVendedor);
        $this->setValorComissao($valorComissao);
        $this->setTotalComissao($totalComissao);
        $this->setNomeUsina($nomeUsina);
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

    public function getData()
    {
        return $this->data;
    }

    public function setData($value)
    {
        $this->data = $value;
        // try
        // {
        //     $this->data = date("Y-m-d", $value);
        // }
        // catch(Exception $ex)
        // {
        //     $this->data = null;
        // }
    }

    public function getTotalBruto()
    {
        return $this->totalBruto;
    }

    public function setTotalBruto($value)
    {
        $this->totalBruto = $value;
    }

    public function getPercDesconto()
    {
        return $this->percDesconto;
    }

    public function setPercDesconto($value)
    {
        $this->percDesconto = $value;
    }

    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    public function setValorDesconto($value)
    {
        $this->valorDesconto = $value;
    }

    public function getTotalLiquido()
    {
        return $this->totalLiquido;
    }

    public function setTotalLiquido($value)
    {
        $this->totalLiquido = $value;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($value)
    {
        $this->situacao = $value;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($value)
    {
        $this->nomeFornecedor = $value;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($value)
    {
        $this->nomeCliente = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getNomeContato()
    {
        return $this->nomeContato;
    }

    public function setNomeContato($value)
    {
        $this->nomeContato = $value;
    }

    public function getPercComissao()
    {
        return $this->percComissao;
    }

    public function setPercComissao($value)
    {
        $this->percComissao = $value;
    }

    public function getEncerrado()
    {
        return $this->encerrado;
    }

    public function setEncerrado($value)
    {
        $this->encerrado = $value;
    }

    public function getTotalVenda()
    {
        return $this->totalVenda;
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }

    public function getTotalLucro()
    {
        return $this->totalLucro;
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalQtde()
    {
        return $this->totalQtde;
    }

    public function setTotalQtde($value)
    {
        $this->totalQtde = $value;
    }

    public function getNumCarga()
    {
        return $this->numCarga;
    }

    public function setNumCarga($value)
    {
        $this->numCarga = $value;
    }

    public function getValorLucro()
    {
        return $this->valorLucro;
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getNomeVendedor()
    {
        return $this->nomeVendedor;
    }

    public function setNomeVendedor($value)
    {
        $this->nomeVendedor = $value;
    }
    
    public function getValorComissao()
    {
        return $this->valorComissao;
    }

    public function setValorComissao($value)
    {
        $this->valorComissao = $value;
    }

    public function getTotalComissao()
    {
        return $this->totalComissao;
    }

    public function setTotalComissao($value)
    {
        $this->totalComissao = $value;
    }

    public function getNomeUsina()
    {
        return $this->nomeUsina;
    }

    public function setNomeUsina($value)
    {
        $this->nomeUsina = $value;
    }
}