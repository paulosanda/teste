<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Traits\StringToInteger;
use Illuminate\Support\Facades\Schema;

class ProdutoController extends Controller
{
    use StringToInteger;
    public function index(Request $request)
    {
        $param = $request->param ? $request->param : null;
        if ($param) {
            $order = match ($param) {
                'codigo' => 'codigo',
                'nome' => 'nome',
                'descricao' => 'descricao',
                'valor' => 'valor',
            };
            $produtos = Produto::all()->sortBy($order);
        } else {
            $produtos = Produto::all();
        }

        return view('produtos', compact('produtos'));
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produtoshow', compact('produto'));
    }

    public function store(ProdutoRequest $request)
    {
        $valor = $this->stringtoint($request->valor);

        Produto::create([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor' => $valor,
        ]);

        return redirect()->action([ProdutoController::class, 'index']);
    }

    public function update(ProdutoRequest $request, $id)
    {
        $valor = $this->stringtoint($request->valor);
        Produto::where('id', $id)->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor' => $valor,
        ]);

        return redirect()->action([ProdutoController::class, 'index']);
    }

    public function search(Request $request)
    {
        $collumns = Schema::getColumnListing('produtos');

        $query = Produto::query();
        foreach ($collumns as $collunm) {
            $query->orWhere($collunm, 'LIKE', '%' . $request->param . '%');
        }
        $produtos = $query->get();

        return view('produtos', compact('produtos'));
    }

    public function destroy($id)
    {
        Produto::where('id', $id)->delete();

        return redirect()->action([ProdutoController::class, 'index']);
    }
}
