<x-app>
    <div class="container-sm">
        <form action=" {{ route('cliente.search')}} " method="post">
            @csrf
            <input type="text" class="form-control" placeholder="pesquisa" name="param">
        </form>
        <table class="table table-striped">
            <thead>
                <th><a href=" {{ url('/cliente?param=nome') }} ">Nome</a></th>
                <th><a href=" {{ url('/cliente?param=email') }} ">Email</a></th>
                <th><a href=" {{ url('/cliente?param=telefone') }} ">Telefone</a></th>
                <th><a href=" {{ url('/cliente?param=endereco') }} ">Endereço</a></th>
                <th><a href=" {{ url('/cliente?param=cpf') }} ">CPF</a></th>
                <th></th>
            </thead>
            @foreach ($clientes as $cliente)
                <tr>
                    <td> {{ $cliente->nome }}</td>
                    <td> {{ $cliente->email }}</td>
                    <td> {{ $cliente->telefone }}</td>
                    <td> @nl2br($cliente->endereco) </td>
                    <td> {{ $cliente->cpf }}</td>
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
                                                <li>
                                                    <a href=" {{ route('pedido.create', $cliente->id)}} ">
                                                        <button type="button" class="btn btn-sm">Novo pedido</button>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=" {{ route('pedido.index','cliente_id='.$cliente->id)}}">
                                                        <button type="button" class="btn btn-sm">Pedidos</button>
                                                    </a>
                                                </li>
                                                <li><a href="{{route('cliente.show', $cliente->id)}}">
                                                        <button type="button" class="btn btn-sm">Editar cadastro</button>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{route('cliente.delete', $cliente->id)}}">
                                                        @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-sm" value="Deletar cadastro">
                                                    </form>
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
