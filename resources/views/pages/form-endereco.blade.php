@extends('layouts.app')

@section('title', 'Agenda | Cadastro de endereço')

@section('content')
    <div class="container">
        <h1>Cadastro de endereço</h1>
    </div>
    @if (session('mensagem_sucesso'))
        <div class="container">
            <div class="alert alert-success">
                <p style="color: green;">{{ session('mensagem_sucesso') }}</p>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="form-container">
            <form action="{{ route('enderecos.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-sm-6">
                        <select class="form-control" name="contato_id" id="contato_id" required>
                            <option value="">Selecione um contato</option>
                            @foreach ($contatos as $contato)
                                <option value="{{ $contato->id }}">{{ $contato->nome_completo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="CEP" name="cep" id="cep" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Rua" name="endereco" id="endereco" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Número" name="numero_residencia" id="numero_residencia" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Bairro" name="bairro" id="bairro" required>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Cidade" name="cidade" id="cidade" required>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" name="uf" id="uf" required>
                            <option value="">Selecione um estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Salvar Endereço</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Adicione o jQuery e jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cep').mask('00000-000');

            $('#cep').on('blur', function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if (validacep.test(cep)) {
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                $('#endereco').val(dados.logradouro);
                                $('#bairro').val(dados.bairro);
                                $('#cidade').val(dados.localidade);
                                $('#uf').val(dados.uf);
                            } else {
                                limpaFormularioCep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } else {
                        limpaFormularioCep();
                        alert("Formato de CEP inválido.");
                    }
                } else {
                    limpaFormularioCep();
                }
            });

            function limpaFormularioCep() {
                $('#endereco').val("");
                $('#bairro').val("");
                $('#cidade').val("");
                $('#uf').val("");
            }
        });
    </script>
@endsection
