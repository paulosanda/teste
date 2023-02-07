<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    public function teststore()
    {
        $this->post(route('cliente.store'), [
            'nome' => "João Teste",
            'email' => 'joao@joao.net',
            'telefone' => '11-9999 8877',
            'cpf' => '123456789',
            'endereco' => 'Rua que sobe desce',
            'numero' => '324',
            'cep' => '123456789',
            'cidade' => 'Jundiaí',
            'uf' => 'SP',
        ]);

        $this->assertDatabaseHas('clientes', [
            'nome' => "João Teste",
            'email' => 'joao@joao.net',
            'telefone' => '11-9999 8877',
            'cpf' => '123456789',
        ]);
    }

    public function testupdate()
    {
        $this->post(route('cliente.store'), [
            'nome' => "João Teste",
            'email' => 'joao@joao.net',
            'telefone' => '11-9999 8877',
            'cpf' => '123456789',
            'endereco' => 'Rua que sobe desce 98 - Bairro Alvorada - São Paulo - SP - CEP 11552224',
        ]);

        $this->put(route('cliente.update', 1), [
            'nome' => "João Teste Alterado",
            'email' => 'alterado-joao@joao.net',
            'telefone' => '11-9999 8877(alterado)',
            'cpf' => '123456789(alterado)',
            'endereco' => 'Alterado Rua que sobe desce 98 - Bairro Alvorada - São Paulo - SP - CEP 11552224',
        ]);

        $this->assertDatabaseHas('clientes', [
            'nome' => "João Teste Alterado",
            'email' => 'alterado-joao@joao.net',
            'telefone' => '11-9999 8877(alterado)',
            'cpf' => '123456789(alterado)',
            'endereco' => 'Alterado Rua que sobe desce 98 - Bairro Alvorada - São Paulo - SP - CEP 11552224',
        ]);
    }

    public function testdelete()
    {
        $this->post(route('cliente.store'), [
            'nome' => "João Teste",
            'email' => 'joao@joao.net',
            'telefone' => '11-9999 8877',
            'cpf' => '123456789',
            'endereco' => 'Rua que sobe desce 98 - Bairro Alvorada - São Paulo - SP - CEP 11552224',
        ]);

        $this->assertDatabaseCount('clientes', 1);

        $this->delete(route('cliente.delete', 1));

        $this->assertDatabaseCount('clientes', 0);
    }
}
