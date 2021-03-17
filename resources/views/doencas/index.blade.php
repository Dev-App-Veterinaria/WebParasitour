@extends('template.template')

@section('conteudo')


<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="../assets/favicon3.png" alt="" width="40%">
        </a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/doencas">
                        <h5>Doenças</h5>
                    </a>
                </li>
                <li class="nav-item">
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
                        <h1 class="mb-4 fw-bold">Doenças</h1>
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
                            <h5 class="fg-primary">Todas as Doenças</h5>

                            <div class="container">
                                @csrf
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome Cientifico</th>
                                            <th>Agente etiológico</th>
                                            <th>Transmissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($doencas as $doenca)
                                        <tr>
                                            <td>{{$doenca['scientificName']}}</td>
                                            <td>{{$doenca['etiologicalAgent']}}</td>
                                            <td>{{$doenca['transmission']}}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger rounded-pill"
                                                    data-toggle="modal" data-toggle="modal" data-target="#excluirPopUp"
                                                    data-id={{$doenca['_id']}}>Excluir</button>
                                            </td>
                                            <td>
                                                <a href="{{url('doencas/'.$doenca['_id'].'/edit')}}"
                                                    style="text-decoration:none">
                                                    <button type="button"
                                                        class="btn btn-primary rounded-pill">Editar</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>ERRO NO SERVIDOR</tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 py-4">
                                    <div class="team-item">
                                        <a href="{{url('doencas/create')}}" style="text-decoration:none">
                                            <button class="btn btn-primary rounded-pill">Adiconar Doença</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pop-up para confirmação de exclusão -->
                            <div class="modal" id="excluirPopUp" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Excluir doença</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que você deseja excluir essa doença?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light rounded-pill"
                                                data-dismiss="modal">Cancelar</button>
                                            <a class="botaoExcluir" style="text-decoration:none">
                                                <button type="button" class="btn btn-danger rounded-pill">Excluir doença</button>
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
                                var url = 'doencas/' + recipient
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