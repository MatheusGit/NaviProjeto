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
            text-align: center;
            font-size: 15px;
            font-weight: bold;  
        }
        #avatar{
            margin-bottom: 10px;
        }
        #icones{
            text-align: right;
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

    <script type="text/javascript">
        function vercep(){
             var cepvalue = document.getElementById("cepmask").value;
             if(cepvalue !== null ){
                 pesquisacep(cepvalue);
             }
        }

        function meu_callback(conteudo) {

            if (!("erro" in conteudo)) {    
                document.getElementById('rua').innerHTML=(conteudo.logradouro);
                document.getElementById('bairro').innerHTML=(conteudo.bairro);
                document.getElementById('cidade').innerHTML=(conteudo.localidade);
                document.getElementById('estado').innerHTML=(conteudo.uf);
            } 
        }

        function pesquisacep(valor){
                var cep = valor.replace(/\D/g, '');
                if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {

                    var script = document.createElement('script');
                    script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                    document.body.appendChild(script);
                } 
            } 
        }
    </script>
</head>
<body onload="vercep();">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
</body>
</html>
