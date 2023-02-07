<x-app>
     <div class="container-sm">
         <form action=" {{ route('cliente.search')}} " method="post">
            @csrf
            <input type="text" class="form-control" placeholder="pesquisa" name="param">
        </form>
        <table class="table table-striped">
            <thead>
                <th>Código</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Valor</th>
            </thead>
            @foreach ($produtos as $produto)
                <tr>
                    <td>$produto->codigo</td>
                    <td>$produto->nome</td>
                    <td>@nl2br($produto->descricao)</td>
                    <td>{{ $produto/100 }}</td>
                </tr>
            @endforeach
        </table>
     </div>
</x-app>
