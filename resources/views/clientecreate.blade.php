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
                <input type="text" class="form-control" id="RegraValida" name="cpf" onblur="javascript: fMasc( this, mCPF );" required>
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
                <input type="text" class="form-control" name="cep" id="cep" required onblur="pesquisacep(this.value);">
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
    function ValidaCPF(){
	var RegraValida=document.getElementById("RegraValida").value;
	var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
	if (cpfValido.test(RegraValida) == true)	{
	console.log("CPF Válido");
	} else	{
	console.log("CPF Inválido");
	}
    }
  function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

  function fMascEx() {
obj.value=masc(obj.value)
}

   function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}
</script>
</x-app>
