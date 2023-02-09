<x-app>
    <div class="container-sm">
        <form action=" {{ route('pedido.search')}} " method="post">
            @csrf
            <input type="text" class="form-control" placeholder="pesquisa" name="param">
        </form>
        <table class="table table-striped">
            <thead>
                <th><a href="{{ url('/pedido?param=status') }} ">Status</a></th>
                <th><a href="{{ url('/pedido?param=id') }}"> Pedido</a></th>
                <th><a href="{{ url('/pedido?param=created_at') }}">Data</a></th>
                <th><a href="{{ url('/pedido?param=cliente_id') }}">Cliente</a></th>
                <th><a href="{{ url('/pedido?param=valor') }}">valor</a></th>
                <th></th>
            </thead>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->id}}</td>
                    <td>{{ date_format($pedido->created_at, "d/m/Y") }}</td>
                    <td>{{ $pedido->cliente->nome}} </td>
                    <td>R$ {{ number_format($pedido->valor/100, 2, ',', '.') }}</td>
                    <td>
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto sm-2 mb-sm-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="material-symbols-outlined">settings</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('pedido.show', $pedido->id)}}">
                                                        <button type="button" class="btn btn-sm">Detalhes</button>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app>
