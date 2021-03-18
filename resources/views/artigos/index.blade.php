@extends('template.template')

@section('conteudo')


<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="../assets/favicon3.png" alt="" width="40%">
        </a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/doencas">
                        <h5>Doenças</h5>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/artigos">
                        <h5>Artigos</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="bg-light">

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(../assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h1 class="mb-4 fw-bold">Artigos</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">

                    <div class="card-page mt-2">

                        <div class="card-page">
                            <h5 class="fg-primary">Todos os Artigos</h5>

                            <div class="container">
                                @csrf
                                <!-- Tabela com os usuários -->
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Identificador</th>
                                            <th>Nome</th>
                                            <th>Doença</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($artigos as $artigo)
                                        <tr>
                                            <th scope="row">{{$artigo['doi']}}</th>
                                            <td>{{$artigo['name']}}</td>
                                            <td>{{$artigo['disease']}}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger rounded-pill fas fa-trash"
                                                    data-toggle="modal" data-toggle="modal" data-target="#excluirPopUp"
                                                    data-id={{$artigo['_id']}}>
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{url('artigos/'.$artigo['_id'].'/edit')}}"
                                                    style="text-decoration:none">
                                                    <button type="button"
                                                        class="btn btn-primary rounded-pill fas fa-edit"></button>
                                                </a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <br>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 py-4">
                                    <div class="team-item">
                                        <a href="{{url('artigos/create')}}" style="text-decoration:none">
                                            <button class="btn btn-primary rounded-pill">Adiconar Artigo</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pop-up para confirmação de exclusão -->
                            <div class="modal fade" id="excluirPopUp" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Excluir Artigo</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que você deseja excluir esse artigo?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light rounded-pill"
                                                data-dismiss="modal">Cancelar</button>
                                            <a class="botaoExcluir" style="text-decoration:none">
                                                <button type="button" class="btn btn-danger rounded-pill">Excluir
                                                    artigo</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Script em JS que passa o rapâmetr para o modal -->
                            <script type="text/javascript">
                            $('#excluirPopUp').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget) // Botão que acionou o modal
                                var recipient = button.data('id') // Extrai informação do atributos data-*
                                var modal = $(this)
                                var url = 'artigos/' + recipient
                                modal.find('.botaoExcluir').attr('href', url)
                            })
                            </script>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <img src="../assets/favicon-light.png" alt="" width="40">
                    <p class="d-inline-block ml-2">Créditos template: &copy; <a href="https://www.macodeid.com/"
                            class="fg-white fw-medium">MACode ID</a>.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>


@endsection