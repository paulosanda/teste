<?php

namespace App\Http\Controllers;

use App\Actions\PedidosList;
use App\Actions\PedidoStore;
use App\Actions\PedidoUpdate;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Support\Facades\Schema;

class PedidoController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     */
    public function index(Request $request)
    {
        $pedidos = app(PedidosList::class)->handle($request);

        return view('pedidos', compact('pedidos'));
    }

    /**
     * create
     *
     * @param  mixed $id
     */
    public function create($id)
    {
        $cliente = Cliente::find($id);

        $produtos = Produto::all()->sortBy('nome');

        return view('pedidocreate', compact('cliente', 'produtos'));
    }

    /**
     * show
     *
     * @param  mixed $id
     */
    public function show($id)
    {
        $pedido = Pedido::with('cliente', 'items')->find($id);

        return view('pedido', compact('pedido'));
    }

    /**
     * store
     *
     * @param  mixed $request
     */
    /**
     * store
     *
     * @param  mixed $request
     */
    public function store(Request $request)
    {
        $pedido = app(PedidoStore::class)->handle($request);

        return view('pedido', compact('pedido'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     */
    public function destroy($id)
    {
        Pedido::where('id', $id)->delete();

        return redirect()->action([PedidoController::class, 'index']);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     */
    public function update(Request $request, $id)
    {

        app(PedidoUpdate::class)->handle($request, $id);

        return redirect()->action([PedidoController::class, 'index']);
    }

    public function search(Request $request)
    {
        $collumns = Schema::getColumnListing('pedidos');

        $query = Pedido::query();
        foreach ($collumns as $collunm) {
            $query->orWhere($collunm, 'LIKE', '%' . $request->param . '%');
        }
        $pedidos = $query->get();

        return view('pedidos', compact('pedidos'));
    }
}
