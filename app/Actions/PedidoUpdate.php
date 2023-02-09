<?php

namespace App\Actions;

use App\Models\Pedido;

class PedidoUpdate
{
    public function handle($data, $id)
    {
        $discount = $data->desconto > 0 ? $data->desconto : null;
        $status = $data->status ? $data->status : null;

        if ($discount) {
            $newValor = $data['valor'] - (intval(round(($data['valor'] * ($discount) / 100))));
            Pedido::where('id', $id)->update([
                'valor' => $newValor,
            ]);
        }

        if ($status) {
            Pedido::where('id', $id)->update([
                'status' => $status,
            ]);
        }
    }
}
