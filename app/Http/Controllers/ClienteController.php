<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Schema;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        $param = $request->param ? $request->param : null;
        if ($param) {
            $order = match ($param) {
                'nome' => 'nome',
                'email' => 'email',
                'telefone' => 'telefone',
                'endereco' => 'endereco',
                'cpf' => 'cpf',
            };
            $clientes = Cliente::all()->sortBy($order);
        } else {
            $clientes = Cliente::all();
        }


        return view('clientes', compact('clientes'));
    }
    public function store(ClienteRequest $request)
    {
        $endereco = $request->endereco . ', ' . $request->numero . " \r\n "  .
            'CEP ' . $request->cep .  " \r\n "  .
            $request->cidade . ' - ' . $request->uf;
        Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $endereco,

        ]);

        return redirect()->action([ClienteController::class, 'index']);
    }

    public function update(ClienteRequest $request, $id)
    {
        Cliente::where('id', $id)->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
        ]);

        return redirect()->action([ClienteController::class, 'index']);
    }

    public function destroy($id)
    {
        $delete = Cliente::where('id', $id)->delete();

        return redirect()->action([ClienteController::class, 'index']);
    }

    public function search(Request $request)
    {
        $collumns = Schema::getColumnListing('clientes');

        $query = Cliente::query();
        foreach ($collumns as $collunm) {
            $query->orWhere($collunm, 'LIKE', '%' . $request->param . '%');
        }
        $clientes = $query->get();

        return view('clientes', compact('clientes'));
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('clienteshow', compact('cliente'));
    }
}
