<?php

namespace App\Entidades;

class Grupo extends EntidadeBase
{
    private $ativo;

    public function __construct($id, $codigo, $nome, $ativo)
    {
        parent::__construct($id, $codigo, $nome);
        $this->setAtivo($ativo);
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($value)
    {
        $this->ativo = $value;
    }
}