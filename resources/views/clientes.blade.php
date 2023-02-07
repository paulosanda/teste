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
                        <form method="post" action="{{route('cliente.delete', $cliente->id)}}">
                            <a href="{{route('cliente.show', $cliente->id)}}"><span class="material-symbols-outlined">settings</span></a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="material-symbols-outlined" value="delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

</x-app>
