<x-app>
     <div class="container-sm">
         <form action=" {{ route('produto.search')}} " method="post">
            @csrf
            <input type="text" class="form-control" placeholder="pesquisa" name="param">
        </form>
        <table class="table table-striped">
            <thead>
                <th><a href=" {{ url('/produto?param=codigo') }} ">Código</a></th>
                <th><a href=" {{ url('/produto?param=nome') }} ">Produto</a></th>
                <th><a href=" {{ url('/produto?param=descricao') }} ">Descrição</a></th>
                <th><a href=" {{ url('/produto?param=valor') }} ">Valor</a></th>
                <th></th>
            </thead>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->codigo }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>@nl2br($produto->descricao)</td>
                    <td>R$ {{ number_format($produto->valor/100, 2, ',', '.') }}</td>
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
                                                <li><a href="{{route('produto.show', $produto->id)}}">
                                                        <button type="button" class="btn btn-sm">Editar</button>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{route('produto.delete', $produto->id)}}">
                                                        @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-sm" value="Deletar">
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
