<?php

namespace App\Actions;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\PedidoProduto;

class PedidoStore
{
    public function handle($data)
    {

        $cliente = Cliente::find($data['cliente_id']);

        $pedido = Pedido::create([
            'status' => 'Aberto',
            'cliente_id' => $cliente->id,
            'cliente_nome' => $cliente->nome,
        ]);

        $total = 0;

        foreach ($data->produto as $produto) {
            $item = Produto::find($produto);

            PedidoProduto::create([
                'pedido_id' => $pedido->id,
                'produto_codigo' => $item->codigo,
                'produto_nome' => $item->nome,
                'produto_valor' => $item->valor,
            ]);

            $total = $total + $item->valor;
        }

        Pedido::where('id', $pedido->id)->update([
            'valor' => $total,
        ]);

        $pedido = Pedido::with('cliente')->find($pedido->id);

        return $pedido;
    }
}
