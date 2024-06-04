<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Endereco;

class EnderecoSeeder extends Seeder
{
    public function run()
    {


        Endereco::create([
            'contato_id' => '23',
            'cep' => '85065-694',
            'endereco' => 'Av. Deputado Cezar Silvestri',
            'numero_residencia' => '4347',
            'bairro' => 'Morro Alto',
            'cidade' => 'Guarapuava',
            'uf' => 'PR'

        ]);

        Endereco::create([
            'contato_id' => '24',
            'cep' => '190',
            'endereco' => '',
            'numero_residencia' => '',
            'bairro' => '',
            'cidade' => 'Guarapuava',
            'uf' => 'PR'

        ]);
        Endereco::create([
            'contato_id' => '25',
            'cep' => '85012-110',
            'endereco' => ' Av. das Dálias',
            'numero_residencia' => '200 ',
            'bairro' => 'Trianon',
            'cidade' => 'Guarapuava',
            'uf' => 'PR'

        ]);
    }
}
