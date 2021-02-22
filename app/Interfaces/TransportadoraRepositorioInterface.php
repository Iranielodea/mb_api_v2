<?php

namespace App\interfaces;

use App\Entidades\Transportadora;
use App\Models\TransportadoraModel;

interface TransportadoraRepositorioInterface
{
    public function __construct(TransportadoraModel $transportadoraModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorCodigo(int $codigo);
    public function salvar(Transportadora $transportadora);
    public function excluir(int $id);
}