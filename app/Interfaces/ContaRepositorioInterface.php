<?php

namespace App\interfaces;

use App\Entidades\Conta;
use App\Models\ContaModel;

interface ContaRepositorioInterface
{
    public function __construct(ContaModel $contaModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorCodigo($codigo);
    public function obterPorId(int $id);
    public function salvar(Conta $conta);
    public function excluir(int $id);
}