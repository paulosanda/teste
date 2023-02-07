<x-app>
    <form method="post" action="{{ route('produto.store') }}">
        @csrf
        <div class="container-sm">
            <div class="mb-3">
                <label class="control-label" for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Produto:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descricao:</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="valor">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" data-thousands="." data-decimal=",">
                <script type="text/javascript">$("#valor").maskMoney();</script>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Cadastrar">
            </div>
        </div>
    </form>
</x-app>
