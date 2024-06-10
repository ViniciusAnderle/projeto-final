<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Telefone;

class ContatoIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testContatoCreationWithEnderecoAndTelefone()
    {
        // Criar um contato
        $contato = Contato::create([
            'nome_completo' => 'Jane Doe',
            'cpf' => '987.654.321-00',
            'email' => 'janedoe@example.com',
            'data_nascimento' => '1990-02-02',
        ]);

        // Associar um endereço ao contato
        $endereco = Endereco::create([
            'contato_id' => $contato->id,
            'cep' => '12345-678',
            'endereco' => 'Rua A',
            'numero_residencia' => '123',
            'bairro' => 'Bairro X',
            'cidade' => 'Cidade B',
            'uf' => 'SP'
        ]);

        // Associar telefones ao contato
        $telefone = Telefone::create([
            'contato_id' => $contato->id,
            'telefone_comercial' => '(11) 1234-5678',
            'telefone_residencial' => '(11) 8765-4321',
            'telefone_celular' => '(11) 91234-5678'
        ]);

        // Verificar se as relações foram criadas corretamente
        $this->assertDatabaseHas('contatos', ['email' => 'janedoe@example.com']);
        $this->assertDatabaseHas('enderecos', ['endereco' => 'Rua A']);
        $this->assertDatabaseHas('telefones', ['telefone_celular' => '(11) 91234-5678']);
    }
}
