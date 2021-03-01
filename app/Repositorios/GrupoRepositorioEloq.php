<?php

namespace App\repositorios;

use App\Entidades\Grupo;
use App\interfaces\GrupoRepositorioInterface;
use App\Models\GrupoModel;
use App\Shared\Funcoes;
use Illuminate\Support\Facades\DB;

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
        $model = $this->obterPorCodigo($codigo);

        if ($model == null)
            $model = new GrupoModel();

        $model->id = $grupo->getId();
        $model->codigo = $grupo->getCodigo();
        $model->nome = $grupo->getNome();
        $model->ativo = $grupo->getAtivo();

        $model->save();
        return Funcoes::retornarOk();
    }
    
    public function excluir(int $id)
    {
        $result = $this->model->find($id)
            ->delete();
        return $result ? Funcoes::retornarOk() : Funcoes::retornarErro();
    }
}