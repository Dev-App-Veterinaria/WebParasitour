<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Mobile Application HTML5 Template">
    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">
    <title>Parasitour</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <!-- Imports de estilo do template -->
    <link rel="stylesheet" href="/assets/css/maicons.css">
    <link rel="stylesheet" href="/assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="/assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/mobster.css">
    <!-- Imports dos scripts -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
        #btn-logout {
            width: 100%;
            padding: 3px 20px !important;
            text-align: left !important;
            font-family: 'Quicksand', Arial, Helvetica, sans-serif;
            background: rgb(255 255 255 / 15%);
            color: #fff;
        }
        #btn-logout:hover {
            color: #9077fc;
            background: rgb(255 255 255 / 80%);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    @if(Session::has('token'))
        <div class="container">
            @if(Request::is('/'))
                <a class="navbar-brand" href="/">
                    <img src="/assets/favicon2.png" alt="" width="30%">
                </a>
            @else
                <a class="navbar-brand" href="/">
                    <img src="/assets/favicon3.png" alt="" width="40%">
                </a>
            @endif
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <?php 
                        $classesDoencas= "nav-item";
                        $classesArtigos= "nav-item";
                        $classesUsuarios = "nav-item";
                        if(str_contains(Request::url(), "doencas")){
                            $classesDoencas .= " active" ;
                        }
                        if(str_contains(Request::url(), "artigos")){
                            $classesArtigos .= " active" ;
                        }
                        if(str_contains(Request::url(), "usuarios")){
                            $classesUsuarios .= " active" ;
                        }
                    ?>
                    <li class="<?php echo $classesDoencas ?>">
                        <a class="nav-link" href="/doencas">
                    <h5>Doenças</h5>
                    </a>
                    </li>
                    <li class="<?php echo $classesArtigos ?>">
                        <a class="nav-link" href="/artigos">
                            <h5>Artigos</h5>
                        </a>
                    </li>
                    <li class="<?php echo $classesUsuarios ?>">
                        <a class="nav-link" href="/usuario">
                            <h5>Usuário</h5>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/logout" class="nav-link">
                            <button type="button" id="btn-logout" class="btn">Sair</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    </nav>
    <!-- Conteúdo das telas que estendem o template -->
    @yield('conteudo')
        <!-- Créditos -->
        <div class="page-footer-section bg-dark fg-white">
        <div class="container">
            <div class="row mb-5 py-3">
                <div class="col-sm-6 py-3">
                    <h5 class="mb-3">Sistema desenvolvido por alunos da<br>
                    Universidade Federal do Agreste de Pernambuco<br>
                    e do Instituto Federal de Pernambuco.</h5>
                </div>
                <div class="col-md-6 col-lg-4 py-3">
                    <h5 class="mb-3">Grupos de pesquisa envolvidos:</h5>
                    <p>• UNAME RESEARCH GROUP</p>
                    <p>• LAPAR</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-2">
                    <img src="/assets/favicon-light.png" alt="" width="40">
                    <p class="d-inline-block ml-2">Créditos template: &copy; <a href="https://www.macodeid.com/" class="fg-white fw-medium">MACode ID</a>.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
