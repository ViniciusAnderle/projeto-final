<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContatoSystemTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Teste de criação de um contato com endereço e telefones.
     *
     * @return void
     */
    public function testCreateContatoWithEnderecoAndTelefones()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contatos/create')
                    ->type('nome_completo', 'Jane Doe')
                    ->type('cpf', '987.654.321-00')
                    ->type('email', 'janedoe@example.com')
                    ->type('data_nascimento', '1990-02-02')
                    ->type('cep', '12345-678')
                    ->type('endereco', 'Rua A')
                    ->type('numero_residencia', '123')
                    ->type('bairro', 'Bairro X')
                    ->type('cidade', 'Cidade B')
                    ->type('uf', 'SP')
                    ->type('telefone_comercial', '(11) 1234-5678')
                    ->type('telefone_residencial', '(11) 8765-4321')
                    ->type('telefone_celular', '(11) 91234-5678')
                    ->press('Salvar')
                    ->assertPathIs('/contatos')
                    ->assertSee('Contato criado com sucesso!')
                    ->assertSee('Jane Doe');
        });
    }
}
