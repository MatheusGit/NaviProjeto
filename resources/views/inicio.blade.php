@extends('layouts.inicio_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="avatar">
            	<img src="/uploads/avatar/{{auth()->guard('logins')->user()->avatar}}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right: 25px; margin-bottom: 100px;" >
                <h2> Perfil de {{auth()->guard('logins')->user()->name}}</h2>
                <form enctype="multipart/form-data" action="{{route('imagem')}}" method="POST">
                	<label>Alterar foto do perfil</label>
                	<input type="file" name="avatar" accept="image/*">
                	<input type="hidden" name="_token" value="{{csrf_token()}}">
                	<input type="submit" value="Enviar imagem" class="pull-right btn btn-sm btn-primary">
                </form>
              </div>
            <div id="todo">
                    <div class="panel panel-default" >
                	   <div id="meusdados" class="panel-heading">
                        <b>Meus dados &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> 
                           @if($info == null)
                                <a href="{{route('editar')}}"> 
                                   <i class="glyphicon glyphicon-plus"></i>
                                   Adicionar
                                </a>
                           @else

                           @endif
                        </div>
                        <div class="panel-body">
                              <div class="form-group ">
                                    <div class=".col-md-4">
                                        Não sabemos nada sobre tu, quem é você afinal? O.o
                                  </div>
                              </div>
                         </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>		
@endsection