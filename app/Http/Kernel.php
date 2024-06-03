<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    public $routeMiddleware = [
        'verificar.contatos.existem' => \App\Http\Middleware\VerificarContatosExistem::class,

    ];
}
