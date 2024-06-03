<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Contato;

class VerificarContatosExistem
{
    public function handle($request, Closure $next)
    {
        $contatos = Contato::all();

        if ($contatos->isEmpty()) {
            return redirect()->route('contatos.create')->with('error', 'Não há contatos cadastrados.');
        }

        return $next($request);
    }
}
