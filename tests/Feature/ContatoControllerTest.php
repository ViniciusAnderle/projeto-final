<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Http\Controllers\ContatoController;
use App\Models\Contato;

class ContatoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $request = Request::create('/contatos', 'POST', [
            'nome_completo' => 'John Doe',
            'cpf' => '123.456.789-00',
            'email' => 'johndoe@example.com',
            'data_nascimento' => '2000-01-01',
        ]);

        $controller = new ContatoController();
        $response = $controller->store($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('contatos', ['email' => 'johndoe@example.com']);
    }
}
