<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\PedidoProduto;

class PedidoController extends Controller
{
    public function index()
    {
        dd('Index method');
    }

    public function create($id)
    {
        $cliente = Cliente::find($id);

        $produto = Produto::all();

        return view('pedidocreate', compact('cliente', 'produto'));
    }
}
