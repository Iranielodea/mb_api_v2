<?php

namespace App\interfaces;

use App\Entidades\Grupo;
use App\Models\GrupoModel;

interface GrupoRepositorioInterface
{
    public function __construct(GrupoModel $grupoModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorCodigo(int $codigo);
    public function salvar(Grupo $grupo);
    public function excluir(int $id);
}