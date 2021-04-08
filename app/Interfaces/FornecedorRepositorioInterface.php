<?php

namespace App\interfaces;

use App\Entidades\Fornecedor;
use App\Models\FornecedorModel;

interface FornecedorRepositorioInterface
{
    public function __construct(FornecedorModel $fornecedorModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorCodigo($codigo);
    public function obterPorId(int $id);
    public function salvar(Fornecedor $fornecedor);
    public function excluir(int $id);
    public function incluir(Fornecedor $fornecedor);
}