<?php

namespace App\interfaces;

use App\Entidades\Usuario;
use App\Models\UsuarioModel;

interface UsuarioRepositorioInterface
{
    public function __construct(UsuarioModel $UsuarioModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorUserName(string $userName);
    public function obterPorId(int $id);
    public function salvar(Usuario $Usuario);
    public function excluir(int $id);
}