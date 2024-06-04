<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contato;

class ContatoSeeder extends Seeder
{
    public function run()
    {


        Contato::create([
            'id' => '23',
            'nome_completo' => 'Polícia',
            'cpf' => '111.111.111-11',
            'email' => 'policia@example.com',
            'data_nascimento' => '2000-01-01',
        ]);

        Contato::create([
            'id' => '24',
            'nome_completo' => 'Bombeiros',
            'cpf' => '222.222.222-22',
            'email' => 'bombeiros@example.com',
            'data_nascimento' => '2000-01-01',
        ]);

        Contato::create([
            'id' => '25',
            'nome_completo' => 'SAMU',
            'cpf' => '333.333.333-33',
            'email' => 'samu@example.com',
            'data_nascimento' => '2000-01-01',
        ]);
    }
}
