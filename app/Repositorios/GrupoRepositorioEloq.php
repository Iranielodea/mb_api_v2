<?php

namespace App\repositorios;

use App\Entidades\Grupo;
use App\interfaces\GrupoRepositorioInterface;
use App\Models\GrupoModel;

class GrupoRepositorioEloq implements GrupoRepositorioInterface
{
    private $model;

    public function __construct(GrupoModel $grupoModel)
    {
        $this->model = $grupoModel;    
    }

    public function filtrar(string $campo, string $valor)
    {
        return $this->model->where($campo, 'like', '%'.$valor.'%')->get();
    }

    public function obterPorId(int $id)
    {
        return $this->model->find($id);
    }

    public function obterPorCodigo(int $codigo)
    {
        return $this->model->where('codigo', '=', $codigo)->first();
    }

    public function salvar(Grupo $grupo)
    {
        $codigo = $grupo->getCodigo();
        if ($codigo > 0)
            $model = $this->obterPorCodigo($codigo);

        if ($model == null)
            $model = $this->model;

        $model->id = $grupo->getId();
        $model->codigo = $grupo->getCodigo();
        $model->nome = $grupo->getNome();
        $model->ativo = $grupo->getAtivo();

        return $model->save();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? true : false;
    }
}