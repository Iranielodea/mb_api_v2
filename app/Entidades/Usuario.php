<?php

namespace App\Entidades;

class Usuario
{
    private $id;
    private $codigo;
    private $username;
    private $senha;

    public function __construct($id, $codigo, $username, $senha)
    {
        $this->setId($id);
        $this->setCodigo($codigo);
        $this->setUserName($username);
        $this->setSenha($senha);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function setUserName($value)
    {
        $this->username = $value;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($value)
    {
        $this->senha = $value;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($value)
    {
        $this->codigo = $value;
    }
}