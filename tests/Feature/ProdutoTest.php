<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Traits\StringToInteger;

class ProdutoTest extends TestCase
{
    use RefreshDatabase, StringToInteger;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduto()
    {
        $this->post(route('produto.store'), [
            'codigo' => fake()->text(10),
            'nome' => 'produto 1',
            'descricao' => fake()->text(50),
            'valor' => '178,76'
        ]);
        $this->assertDatabaseCount('produtos', 1);
    }

    public function testUpdateProduto()
    {
        Produto::factory()->createOne();
        $this->put(route('produto.update', 1), [
            'codigo' => 'codigo do produto alterado',
            'nome' => 'nome do produto alterado',
            'descricao' => 'descricao do produto alterada',
            'valor' => '898,45',
        ]);

        $this->assertDatabaseHas('produtos', [
            'codigo' => 'codigo do produto alterado',
            'nome' => 'nome do produto alterado',
            'descricao' => 'descricao do produto alterada',
            'valor' => '89845',
        ]);
    }

    public function testDeleteProduto()
    {
        Produto::factory()->createOne();

        $this->assertDatabaseCount('produtos', 1);

        $this->delete(route('produto.delete', 1));

        $this->assertDatabaseCount('produtos', 0);
    }
}
