<?php

namespace App\repositorios;

use App\Entidades\Usuario;
use App\interfaces\UsuarioRepositorioInterface;
use App\Models\UsuarioModel;

class UsuarioRepositorioEloq implements UsuarioRepositorioInterface
{
    private $model;

    public function __construct(UsuarioModel $UsuarioModel)
    {
        $this->model = $UsuarioModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorUserName(string $userName)
    {
        return $this->model->where('username', '=', $userName)->first();
    }

    public function salvar(Usuario $usuario)
    {
        $userName = $usuario->getUserName();

        if (!empty($userName))
            $model = $this->obterPorUserName($userName);

        if ($model == null)
            $model = $this->model;            

        $model->codigo = $usuario->getCodigo();
        $model->username = $usuario->getUserName();
        $model->senha = $usuario->getSenha();

        return $model->save();
    }
    
    public function excluir(int $id): bool
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}