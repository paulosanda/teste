<x-app>
    <div class="container-sm">
        <div class="mb-3">
            <div class=row>
                <table class="table">
                    <thead>
                        <th colspan="3"><h3>Pedido - {{ $pedido->id}} </h3></th>
                    </thead>
                    <tr>
                        <td colspan="2">Cliente: {{ $pedido->cliente->nome}}</td>
                        <td>Data: {{date_format($pedido->created_at, 'd/m/Y')}}</td>
                    </tr>
                    <tr>
                        <td>CPF: {{ $pedido->cliente->cpf}}</td>
                        <td>Email: {{ $pedido->cliente->email }}</td>
                        <td>Telefone: {{ $pedido->cliente->telefone }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            @nl2br($pedido->cliente->endereco)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Valor do pedido: R$ {{ number_format($pedido->valor/100, 2, ',', '.') }}</td>
                        <td>Status: {{ $pedido->status }}</td>
                    </tr>
                    @if($pedido->status == 'Aberto')
                    <tr>
                        <td colspan="3">
                            <form method="post" action="{{ route('pedido.update', $pedido->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="valor" value="{{ $pedido->valor}}">
                            Aplicar desconto: <input type="number" name="desconto" min="0" max="100">%
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form method="post" action="{{ route('pedido.update', $pedido->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Pago">
                            <input type="submit" class="btn btn-primary" value="Pago">
                            </form>

                        </td>
                         <td>
                            <form method="post" action="{{ route('pedido.update', $pedido->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Cancelado">
                            <input type="submit" class="btn btn-warning" value="Cancelado">
                            </form>
                        </td>
                            <td>
                            <form method="post" action="{{ route('pedido.delete', $pedido->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Deletar">
                            </form>
                        </td>
                    </tr>
                    @endif
                </table>
                 <table class="table  table-striped">
                        <thead>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Valor</th>
                        </thead>
                        @foreach ($pedido->items as $item )
                            <tr>
                                <td>{{ $item->produto_codigo}}</td>
                                <td>{{ $item->produto_nome }}</td>
                                <td>R$ {{ number_format($item->produto_valor/100, 2, ',', '.') }}
                            </tr>
                        @endforeach
                 </table>
            </div>
        </div>
    </div>
</x-app>
