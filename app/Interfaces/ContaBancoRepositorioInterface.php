<?php

namespace App\interfaces;

use App\Entidades\ContaBanco;
use App\Models\ContaBancoModel;

interface ContaBancoRepositorioInterface
{
    public function __construct(ContaBancoModel $contaBancoModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorCodigo(int $codigo);
    public function obterPorId(int $id);
    public function Salvar(ContaBanco $contaBanco);
    public function excluir(int $id);
}