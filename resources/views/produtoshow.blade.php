<x-app>
    <form action="{{ route('produto.update', $produto->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="container-sm">
            <div class="mb-3">
                <label class="form-label" for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required value="{{ $produto->codigo }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Produto:</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="{{ $produto->nome }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required value="{{ $produto->descricao }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="valor">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor" required value="{{ number_format($produto->valor/100, 2, ',', '.') }} " id="valor" data-thousands="." data-decimal=",">
                <script type="text/javascript">$("#valor").maskMoney();</script>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Atualizar">
            </div>
        </div>
    </form>
</x-app>
