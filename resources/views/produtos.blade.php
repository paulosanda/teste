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
                        <form method="post" action="{{route('produto.delete', $produto->id)}}">
                            <a href="{{route('produto.show', $produto->id)}}"><span class="material-symbols-outlined">settings</span></a>
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
