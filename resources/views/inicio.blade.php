@extends('layouts.inicio_layout')

@section('content')
            <div id="todo">
                    <div class="panel panel-default" >
                	   <div class="panel-heading">
                         <div id="meusdados">
                                <b>Meus dados</b> 
                                &nbsp&nbsp&nbsp
                               @if($info == null)
                                    <a href="{{route('editar')}}"> 
                                       <i class="glyphicon glyphicon-plus"></i>
                                       Adicionar
                                    </a>
                               @else

                               @endif
                           </div>
                        </div>
                        <div class="panel-body">
                              <div class="form-group">
                                    <div class=".col-md-4">
                                        Não sabemos nada sobre tu, quem é você afinal? O.o
                                    </div>
                              </div>
                         </div>
                    </div>                  
                </div>
            </div>	
@endsection