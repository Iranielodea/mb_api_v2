<?php
namespace App\Entidades;

class Fornecedor extends PessoaBase
{
    private $complemento;
    private $numero;
    private $fantasia;
    private $fone;

    public function __construct($id, $codigo, $nome, $bairro, $cep, $cnpj, $email, $endereco,
        $fax, $inscEstadual, $nomeCidade, $obs, $uf, $complemento, $fantasia, $fone, $numero)
    {
        parent::__construct($id, $codigo, $nome, $bairro, $cep, $cnpj, $email, $endereco,
            $fax, $inscEstadual, $nomeCidade, $obs, $uf);

        $this->setComplemento($complemento);
        $this->setNumero($numero);
        $this->setFantasia($fantasia);
        $this->setFone($fone);
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getFantasia()
    {
        return $this->fantasia;
    }

    public function setFantasia($fantasia)
    {
        $this->fantasia = $fantasia;
    }

    public function getFone()
    {
        return $this->fone;
    }

    public function setFone($fone)
    {
        $this->fone = $fone;
    }
}