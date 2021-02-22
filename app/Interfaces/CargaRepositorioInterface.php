<?php

namespace App\interfaces;

use App\Entidades\Carga;
use App\Models\CargaModel;

interface CargaRepositorioInterface
{
    public function __construct(CargaModel $cargaModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorNumCarga(int $numCarga);
    public function salvar(Carga $carga);
    public function excluir(int $id);
}