<x-app>
<form method="post" action="{{ route('pedido.store') }}">
    @csrf
    <div class="container-sm">
        <div class="mb-3">
            <div class=row>
                <table class="table">
                    <thead>
                        <th colspan="3"><h3>Pedido</h3></th>
                    </thead>
                    <tr>
                        <td colspan="3">Cliente: {{ $cliente->nome}}</td>
                    </tr>
                    <tr>
                        <td>CPF: {{ $cliente->cpf}}</td>
                        <td>Email: {{ $cliente->email }}</td>
                        <td>Telefone: {{ $cliente->telefone }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            @nl2br($cliente->endereco)
                        </td>
                    </tr>
                </table>
                <form method="post" action="{{ route('produto.store') }}">
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}"
                    @csrf
                    <table class="table  table-striped">
                        <thead>
                            <th></th>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                        </thead>
                        <!-- {{ $key = 0 }} -->
                        @foreach ($produtos as $produto)
                            <tr>
                                <td><input type="checkbox" name="produto[{{ $key }}]" value="{{ $produto->id }}"></td>
                                <td> {{ $produto->codigo }} </td>
                                <td> {{ $produto->nome }} </td>
                                <td> @nl2br($produto->descricao) </td>
                                <td> R$ {{ number_format($produto->valor/100, 2, ',', '.') }} </td>
                            </tr>
                        <!-- {{ $key++ }} -->
                        @endforeach
                    </table>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-sm btn-primary" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
