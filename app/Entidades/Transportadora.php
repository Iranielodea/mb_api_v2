<?php

namespace App\Entidades;

class Transportadora extends PessoaBase
{
    private $cpfTrans;
    private $fone1;
    private $fone2;
    private $ddd;
    private $contato;
    private $numBanco;
    private $nomeBanco;
    private $numAgencia;
    private $numConta;
    private $titular;

    public function __construct($id, $codigo, $nome, $bairro, $cep, $cnpj, $email, $endereco,
    $fax, $inscEstadual, $nomeCidade, $obs, $uf, $cpfTrans, $fone1, $fone2, $ddd, $contato,
    $numBanco, $nomeBanco, $numAgencia, $numConta, $titular)
    {
        parent::__construct($id, $codigo, $nome, $bairro, $cep, $cnpj, $email, $endereco,
        $fax, $inscEstadual, $nomeCidade, $obs, $uf);

        $this->setCpfTrans($cpfTrans);
        $this->setFone1($fone1);
        $this->setFone2($fone2);
        $this->setDDD($ddd);
        $this->setContato($contato);
        $this->setNumBanco($numBanco);
        $this->setNomeBanco($nomeBanco);
        $this->setNumAgencia($numAgencia);
        $this->setNumConta($numConta);
        $this->setTitular($titular);
    }

    public function setCpfTrans($value)
    {
        $this->cpfTrans = $value;
    }

    public function getCpfTrans()
    {
        return $this->cpfTrans;
    }

    public function setFone1($value)
    {
        $this->Fone1 = $value;
    }

    public function getFone1()
    {
        return $this->fone1;
    }

    public function setFone2($value)
    {
        $this->Fone2 = $value;
    }

    public function getFone2()
    {
        return $this->fone2;
    }

    public function setDDD($value)
    {
        $this->ddd = $value;
    }

    public function getDDD()
    {
        return $this->ddd;
    }

    public function setContato($value)
    {
        $this->contato = $value;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setNumBanco($value)
    {
        $this->numBanco = $value;
    }

    public function getNumBanco()
    {
        return $this->numBanco;
    }

    public function setNomeBanco($value)
    {
        $this->nomeBanco = $value;
    }

    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }

    public function setNumAgencia($value)
    {
        $this->numAgencia = $value;
    }

    public function getNumAgencia()
    {
        return $this->numAgencia;
    }

    public function setNumConta($value)
    {
        $this->numConta = $value;
    }

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setTitular($value)
    {
        $this->titular = $value;
    }

    public function getTitular()
    {
        return $this->titular;
    }

}