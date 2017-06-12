@extends('layouts.inicio_layout')

@section('content')
            <div id="todo">
                    <div class="panel panel-default" >
                	   <div class="panel-heading">
                         <div id="meusdados">
                                <b>Meus dados - Visualização</b> 
                                &nbsp&nbsp&nbsp
                               @if($info == null)
                                    <a href="{{route('editar')}}"> 
                                       <i class="glyphicon glyphicon-plus"></i>
                                       Adicionar
                                    </a>
                               @else
                                    <a href="{{route('editar')}}"> 
                                       <i class="glyphicon glyphicon-pencil"></i>
                                       Editar
                                    </a>
                                    &nbsp&nbsp&nbsp
                                    <a href="{{route('excluir')}}"> 
                                       <i class="glyphicon glyphicon-trash"></i>
                                       Apagar tudo
                                    </a>
                               @endif
                           </div>
                        </div>

                        @if($info == null)
                        <div class="panel-body">
                              <div class="form-group">
                                    <div class=".col-md-4" style="text-align: center;">
                                        Não possuimos nenhuma informação sua.. que mistério! Quem é você afinal? O.o
                                    </div>
                              </div>
                         </div>
                         @else
                         <div class="panel-body">
                            <div class="form-horizontal">
                                                         <div class="panel-body">

                         <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> {{$email or '???'}}</p>
                                </div>   
                        </div>

                        <hr>

                        <label id="labeldados">Dados pessoais</label>

                         <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Nome:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> {{$name or '???'}}</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">CPF:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> {{$info->cpf or '???'}}</p>
                                </div>   
                        </div>

                        

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">RG:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> {{$info->rg or '???'}}</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Data de nascimento:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> {{$info->datanasc or '???'}}</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gênero:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static"> 
                                   @if($info->genero_select == "Outro")
                                      {{$info->outro or '???'}}
                                   @else
                                       {{$info->genero_select or '???'}} 
                                   @endif       
                                   </p>
                                </div>   
                        </div>

                        <hr>

                        <label id="labelendereco"><b>Endereço</b></label>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">CEP:</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="cpfinput" id="cepmask" value="{{$info->cep or ''}}">
                                   <p class="form-control-static"> {{$info->cep or '???'}}</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Rua:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static" id="rua"> ??? </p>
                                </div>   
                        </div>

                       <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Número:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static">{{$info->numero or '???'}} </p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Complemento:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static">
                                     @if($info->complemento_select == "Sim")
                                          {{$info->complemento or '???'}}
                                     @else
                                          Não
                                     @endif        
                                   </p>
                                </div>   
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Bairro:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static" id="bairro" >???</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Cidade:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static" id="cidade">???</p>
                                </div>   
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Estado:</label>
                                <div class="col-md-6">
                                   <p class="form-control-static" id="estado">???</p>
                                </div>   
                        </div>

                            
                        </div>
</div>  

                             </div>   
                         </div>
                         @endif
                                    
                </div>
            </div>	
            </div>
@endsection