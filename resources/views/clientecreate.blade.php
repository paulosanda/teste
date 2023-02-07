<x-app>
    <form method="post" action="{{ route('cliente.store')}} ">
        @csrf
        <div class="container-sm">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3" id="cep">
                <label class="form-label" for="cep">Cep</label>
                <input type="text" class="form-control" name="cep" id="cep" required>
                <script type="text/javascript">
                    $(document).ready(function(){
	                    $("#cep").mask("99.999-999");
                    });
                </script>
            </div>
            <div class="mb-3" id="endereco">
                <label class="form-label" for="endereco">Endereço:</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="endereco" id="endereco" required>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="numero" id="numero" required placeholder="numero">
                    </div>
                </div>
            </div>
            <div class="mb-3" id="cidade">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="cidade" id="cidade" required placeholder="cidade">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="uf" id="uf" required placeholder="uf">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Cadastrar">
            </div>
        </div>
    </form>

</x-app>
