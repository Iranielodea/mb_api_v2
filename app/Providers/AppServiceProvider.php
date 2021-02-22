<?php

namespace App\Providers;

use App\interfaces\CargaRepositorioInterface;
use App\interfaces\GrupoRepositorioInterface;
use App\interfaces\ClienteRepositorioInterface;
use App\interfaces\ContaBancoRepositorioInterface;
use App\interfaces\ContaRepositorioInterface;
use App\interfaces\PedidoItemRepositorioInterface;
use App\interfaces\PedidoRepositorioInterface;
use App\interfaces\TransportadoraRepositorioInterface;
use App\interfaces\UsuarioRepositorioInterface;
use App\repositorios\CargaRepositorioEloq;
use App\Repositorios\ClienteRepositorioEloq;
use App\repositorios\ContaBancoRepositorioEloq;
use App\repositorios\ContaRepositorioEloq;
use App\repositorios\GrupoRepositorioEloq;
use App\Repositorios\PedidoItemRepositorioEloq;
use App\Repositorios\PedidoRepositorioEloq;
use App\Repositorios\TransportadoraRepositorioEloq;
use App\repositorios\UsuarioRepositorioEloq;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GrupoRepositorioInterface::class, GrupoRepositorioEloq::class);
        $this->app->bind(UsuarioRepositorioInterface::class, UsuarioRepositorioEloq::class);
        $this->app->bind(ClienteRepositorioInterface::class, ClienteRepositorioEloq::class);
        $this->app->bind(TransportadoraRepositorioInterface::class, TransportadoraRepositorioEloq::class);
        $this->app->bind(PedidoRepositorioInterface::class, PedidoRepositorioEloq::class);
        $this->app->bind(PedidoItemRepositorioInterface::class, PedidoItemRepositorioEloq::class);
        $this->app->bind(CargaRepositorioInterface::class, CargaRepositorioEloq::class);
        $this->app->bind(ContaRepositorioInterface::class, ContaRepositorioEloq::class);
        $this->app->bind(ContaBancoRepositorioInterface::class, ContaBancoRepositorioEloq::class);
    }
}
