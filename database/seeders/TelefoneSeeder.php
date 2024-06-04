<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contato;
use App\Models\Telefone;

class TelefoneSeeder extends Seeder
{
    public function run()
    {


        Telefone::create([
            'contato_id' => '23',
            'telefone_comercial' => '190'
            
        ]);

        Telefone::create([
            'contato_id' => '24',
            'telefone_comercial' => '193'
 
        ]);

        Telefone::create([
            'contato_id' => '25',
            'telefone_comercial' => '192'

        ]);
    }
}
