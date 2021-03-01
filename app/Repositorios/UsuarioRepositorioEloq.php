<?php

namespace App\repositorios;

use App\Entidades\Usuario;
use App\interfaces\UsuarioRepositorioInterface;
use App\Models\UsuarioModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

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
        $model = $this->obterPorUserName($usuario->getUserName());
        if ($model == null)
            $model = new UsuarioModel();

        $model->codigo = $usuario->getCodigo();
        $model->username = $usuario->getUserName();
        $model->senha = $usuario->getSenha();
        
        $model->save();
        return Funcoes::RetornarOk();
    }

    // private function incluir(Usuario $usuario)
    // {
    //     DB::table('usuario')->insert([
    //         'codigo' => $usuario->getCodigo(),
    //         'user_name' => $usuario->getUserName(),
    //         'senha' => $usuario->getSenha()
    //     ]);
    // }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::RetornarOk() : Funcoes::retornarErro();
    }
}