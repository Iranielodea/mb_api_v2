<?php

namespace App\Entidades;

class EntidadeBase
{
    private $id;
    private $codigo;
    private $nome;

    public function __construct($id, $codigo, $nome)
    {
        $this->setId($id);
        $this->setCodigo($codigo);
        $this->setNome($nome);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}