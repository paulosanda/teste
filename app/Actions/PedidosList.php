<?php

namespace App\Actions;

use App\Models\Pedido;

class PedidosList
{
    /**
     * handle
     *
     * @param  mixed $data
     */
    public function handle($data)
    {
        $param = $data->param ? $data->param : null;

        $cliente_id = $data->cliente_id ? $data->cliente_id : null;

        if ($param) {
            $order = match ($param) {
                'status' => 'status',
                'id' => 'id',
                'created_at' => 'created_at',
                'cliente_id' => 'cliente_id',
                'valor' => 'valor',
            };
            if ($order == 'cliente_id') {
                $pedidos = Pedido::select('*')
                    ->join('clientes', 'pedidos.cliente_id', '=', 'clientes.id')
                    ->orderBy('clientes.nome')->get();
            } else {
                $pedidos = Pedido::with('cliente')->orderBy($order)->get();
            }
        } else {
            $pedidos = Pedido::with('cliente')->get();
        }

        if ($cliente_id) {
            $pedidos = Pedido::where('cliente_id', $cliente_id)->get();
        }

        return $pedidos;
    }
}
