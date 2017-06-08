@extends('layouts.cadastro_two')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Meus dados - Você já está cadastrado! Preencha essa informações agora ou depois, logando quando quiser!</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('cadastro_two') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                   {{$name}}
                                </div>
                        </div>

                         <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                   {{$email}}
                                </div>   
                        </div>


                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" pattern="\d*" class="form-control" name="cpf" minlength="6" maxlength="9" placeholder='XXXXXXXXXXX' required>

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" pattern="\d*" name="rg" placeholder="XXXXXXXXX" minlength="6" maxlength="9" required>

                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('datanasc') ? ' has-error' : '' }}">
                            <label for="datanasc" class="col-md-4 control-label">Data de nascimento</label>

                            <div class="col-md-6">
                                <input id="datanasc" type="date" class="form-control" name="datanasc" required>
                                <strong>teste teste teste</strong>
                                @if ($errors->has('datanasc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datanasc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="datanasc" class="col-md-4 control-label">Gênero</label>
                            <div class="col-md-6">
                                <select id="select_genero" name="genero" onchange="verificaroutro()">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro...</option>
                                </select>
                            </div>
                        </div>

                        
                        <script>
                            function verificaroutro() {
                                var option = document.getElementById('select_genero').value;
                                var valuee = "Outro";
                                if(option == valuee){
                                    document.getElementById("invisivel").style.display = 'block';
                                }else{
                                    document.getElementById("invisivel").style.display = 'none';
                                }
                            }
                        </script>


                        <div id="invisivel" class="form-group">
                            <label for="rg" class="col-md-4 control-label">Qual gênero?</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name= "outro" required>
                            </div>
                        </div>

                        <div id="botoes" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
