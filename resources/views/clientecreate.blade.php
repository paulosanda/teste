<x-app>
    <form method="post" action="{{ route('cliente.store')}} ">
        @csrf
        <div class="container-sm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cpf">CPF:</label>
                <input type="text" class="form-control inputCPF" id="inputCPF" name="cpf" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefone">Telefone:</label>
                <input type="text" class="form-control phone-mask" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3" id="cep">
                <label class="form-label" for="cep">Cep</label>
                <input type="text" class="form-control cep-mask" name="cep" id="cep" required onblur="pesquisacep(this.value);">
            </div>
            <div class="mb-3" id="endereco">
                <label class="form-label" for="endereco">Endereço:</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="rua" id="rua">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="numero" id="numero" required placeholder="numero">
                    </div>
                </div>
            </div>
            <div class="mb-3" id="localidade">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="cidade" id="cidade" required>
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

<script>

    $(document).ready(function(){
        $('.cep-mask').mask('00000-000');
        $('.phone-mask').mask('(00) 00000 0000');
        $('.inputCPF').mask('000.000.000-00');
    });


    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };




    function validateCPF(cpf) {

        cpf = cpf.replace(/[^\d]+/g,''); // Remove tudo que não é número

        var sum = 0;
        var     rest;

        if (cpf == "00000000000") return false;

        for (var i=1; i<=9; i++) sum = sum + parseInt(cpf.substring(i-1, i)) * (11 - i);
        rest = (sum * 10) % 11;

        if ((rest == 10) || (rest == 11))  rest = 0;
        if (rest != parseInt(cpf.substring(9, 10)) ) return false;

        sum = 0;
        for (var i = 1; i <= 10; i++) sum = sum + parseInt(cpf.substring(i-1, i)) * (12 - i);
        rest = (sum * 10) % 11;

        if ((rest == 10) || (rest == 11))  rest = 0;
        if (rest != parseInt(cpf.substring(10, 11) ) ) return false;
        return true;
    }

    var inputCPF = document.getElementById("inputCPF");
    inputCPF.addEventListener("blur", function() {
    if (!validateCPF(inputCPF.value)) {
    alert("CPF inválido!");
  }
});

</script>

</x-app>
