<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Navi</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style type="text/css">
        #meusdados{
            text-align: left;
            font-size: 15px;
            font-weight: bold;  
        }
        #avatar{
            margin-bottom: 10px;
        }
        #todo{
            margin-top: 0px;
        }
    
        #invisivel{
              display:none;
        }       

        #cep{
            display:none;
        }

        #divcomplemento{
            display:none;
        }

        #botoes{
        	width: 1500px;
		}	

        #labeldados{
            display: block;
            width:200px;
          
            font-size: 14px;
        } 

        #labelendereco{
            display: inline-block;
            width:200px;
            
            font-size: 14px;
        }	   


    </style>

    
    <script>
        function verificaroutro() {
            var option = document.getElementById('select_genero').value;
            var valuee = "Outro";
                if(option == valuee){
                    document.getElementById("inputoutro").innerHTML = '<input type="text" class="form-control" name= "outro" placeholder="Outro..." required>';
                    document.getElementById("invisivel").style.display = 'block';
                }else{
                    document.getElementById("inputoutro").innerHTML = '';
                    document.getElementById("invisivel").style.display = 'none';
                }
        }

        function verificarcomplemento() {
            var option = document.getElementById('complemento').value;
            var valuee = "Sim";
                if(option == valuee){
                    document.getElementById("inputcomplemento").innerHTML = '<input type="text" class="form-control" name= "complemento" placeholder="Complemento..." required>';
                    document.getElementById("divcomplemento").style.display = 'block';
                }else{
                    document.getElementById("inputcomplemento").innerHTML = '';
                    document.getElementById("divcomplemento").style.display = 'none';
                }
        }

        function limpa_formulário_cep() {
            document.getElementById("cepmask").value = '';
            document.getElementById("cep").style.display = 'none';
            document.getElementById("inputnumero").innerHTML ='';
            document.getElementById('complemento').value = 'Nao';

            document.getElementById('cep').value=("");
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
        }

        function meu_callback(conteudo) {

            if (!("erro" in conteudo)) {    
                document.getElementById('cepstrong').innerHTML = "";

                document.getElementById("cep").style.display = 'block';
                document.getElementById("inputnumero").innerHTML ='<input type="number" class="form-control" id="numero" name="numero" min="0" placeholder="Número de sua casa" required>';

                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } 
            else {
                limpa_formulário_cep();
                document.getElementById('cepstrong').innerHTML = "Cep não encontrado";
            }
        }

        function pesquisacep(valor){
                var cep = valor.replace(/\D/g, '');
                if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {

                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";

                    var script = document.createElement('script');
                    script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                    document.body.appendChild(script);

                } 
                else {
                    limpa_formulário_cep();
                    document.getElementById('cepstrong').innerHTML = "Formato de cep inválido";
                }
            } 
            else {
                limpa_formulário_cep();
            }
        }
     </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                            Navi
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/uploads/avatar/{{auth()->guard('logins')->user()->avatar}}" style="width:30px; height:30px; float:left; border-radius: 50%; margin-right: 5px; margin-bottom: 5px;" >
                                    {{ auth()->guard('logins')->user()->name}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>                                        
                                        <a href="{{ route('sair') }}"><i class="fa fa-btn fa-sign-out"> </i> Sair</a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
         <div class="row">
          <div class="col-md-8 col-md-offset-2" style="height: 190px;">
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
          </div>   
           <div class="col-md-8 col-md-offset-2"> 
        @yield('content')
                </div>
            </div>
        </div>  
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
                        <script type="text/javascript">
                            $().ready(function(){
                                  $('#cpf').mask('000.000.000-00', {reverse: true});
                                  $('#rg').mask('000.000.000');
                                  $('#cepmask').mask('00000-000');
                                  $('#datanasc').mask('00/00/0000');
                            });  


                        </script> 
</body>
</html>
