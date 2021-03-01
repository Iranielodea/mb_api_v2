<?php

namespace App\Shared;

class Funcoes
{
    public static function retornarOk()
    {
        return array("mensagem" => "OK");
    }

    public static function retornarErro()
    {
        return array("mensagem" => "Erro ");
    }
}