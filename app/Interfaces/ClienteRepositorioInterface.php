<?php

namespace App\interfaces;

use App\Entidades\Cliente;
use App\Models\ClienteModel;

interface ClienteRepositorioInterface
{
    public function __construct(ClienteModel $clienteModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorCodigo(int $codigo);
    public function salvar(Cliente $cliente);
    public function excluir(int $id);
}