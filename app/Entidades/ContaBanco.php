<?php

namespace App\Entidades;

class ContaBanco
{
    private $id;
    private $codigo;
    private $numConta;
    private $agencia;
    private $nomeBanco;
    private $ativo;
    private $cnpjCpf;

    public function __construct($id, $codigo, $numConta, $agencia, $nomeBanco, $ativo, $cnpjCpf)
    {
        $this->setId($id);
        $this->setCodigo($codigo);
        $this->setNumConta($numConta);
        $this->setAgencia($agencia);
        $this->setNomeBanco($nomeBanco);
        $this->setAtivo($ativo);
        $this->setCnpjCpf($cnpjCpf);
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

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setNumConta($value)
    {
        $this->numConta = $value;
    }

    public function getAgencia()
    {
        return $this->agencia;
    }

    public function setAgencia($value)
    {
        $this->agencia = $value;
    }

    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }

    public function setNomeBanco($value)
    {
        $this->nomeBanco = $value;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($value)
    {
        $this->ativo = $value;
    }

    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    public function setCnpjCpf($value)
    {
        $this->cnpjCpf = $value;
    }
}