<x-app>
    <form action="{{ route('cliente.update', $cliente->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="container-sm">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="{{ $cliente->nome }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $cliente->cpf }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required value="{{ $cliente->telefone }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required value="{{ $cliente->email }}">
            </div>
            <div class="mb-3" id="endereco">
                <label class="form-label" for="endereco">Endereço:</label>
                <textarea class="form-control" name="endereco" id="endereco" rows="5">{{ $cliente->endereco }}</textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Atualizar">
            </div>
        </div>
    </form>
</x-app>
