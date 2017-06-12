@extends('layouts.cadastro_two')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="register" class="panel-heading"> Cadastro - Passo 2 
                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Meus dados" data-content="Você já está cadastrado! Preencha essa informações agora ou depois, logando quando quiser!">?</button>
                </div>
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('cadastro_two') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                   {{$name}}
                                </div>
                        </div>

                         <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <input type="hidden" name="email" value="{{$email}}">

                                <div class="col-md-6">
                                    {{$email}}
                                </div>   
                        </div>

                        <hr>

                        <label id="labeldados">Dados pessoais:</label>

                        <input type="hidden" name="senhab" value="{{$password}}">

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" min="14" max="14" placeholder='CPF'  >

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
                                <input id="rg" type="text" class="form-control" name="rg" placeholder="RG" minlength="7" maxlength="11" >

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
                                <input id="datanasc" type="text" class="form-control" maxlength="10" name="datanasc" placeholder="dd/mm/aaaa" >

                                @if ($errors->has('datanasc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datanasc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                            <label for="genero" class="col-md-4 control-label">Gênero</label>
                            <div class="col-md-6">
                                <select id="select_genero" name="genero_select" onchange="verificaroutro()" >
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro...</option>
                                </select>
                            </div>
                        </div>

                        <div id="invisivel" class="form-group">
                            <label for="rg" class="col-md-4 control-label">Qual gênero?</label>
                            <div class="col-md-6">
                                <div id="inputoutro"> </div>
                            </div>
                        </div>

                        <hr>

                        <label id="labelendereco"><b>Endereço:</b></label>

                        <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">CEP</label>
                            <div class="col-md-6">
                                <input type="text" id="cepmask" class="form-control" name="cep" size="10" maxlength="9" placeholder="Cep" onblur="pesquisacep(this.value);" >
                                <span class="has-error">
                                     <strong class="has-error" id="cepstrong"></strong>
                                </span>
                            </div>
                        </div>    

                        <div id="cep">
                            <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">Rua</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="rua" name= "rua" disabled="yes">
                            </div>
                            </div> 

                            <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">Número</label>
                            <div class="col-md-6">
                                <div id="inputnumero"></div>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="datanasc" class="col-md-4 control-label">Complemento?</label>
                            <div class="col-md-6">
                                <select id="complemento" name="complemento_select" onchange="verificarcomplemento()" >
                                    <option value="" disabled selected>Sim ou não?</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                            </div>

                            <div class="form-group" id="divcomplemento">
                            <label for="rg" class="col-md-4 control-label">Qual complemento?</label>
                            <div class="col-md-6">
                                <div id="inputcomplemento"> </div>
                            </div>
                            </div> 

                            <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">Bairro</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="bairro" name="bairro" disabled="yes">
                            </div>
                            </div> 

                            <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">Cidade</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cidade" name="cidade" disabled="yes">
                            </div>
                            </div> 

                            <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="uf" name="uf" disabled="yes">
                            </div>
                            </div>

                            
                        </div>

                        <hr>

                        <label id="labeldados">Segurança:</label>

                        <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                           <div class="col-md-4 col-md-offset-4">
                                <a href="{{route('login')}}" class="btn btn-primary">
                                    Cancelar
                                </a>
                            </div>
                             <div class="col-md-4 .col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
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
