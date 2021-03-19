@extends('template.template')

@section('conteudo')


<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/favicon3.png" alt="" width="40%">
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

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(/assets/img/hero_mini.svg);">
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
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nome Cientifico</th>
                                            <th>Nome Popular</th>
                                            <th>Agente Etiológico</th>
                                            <th>Transmissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($doencas as $doenca)
                                        <tr>
                                            <td>{{$doenca['scientificName']}}</td>
                                            <td>{{$doenca['name']}}</td>
                                            <td>{{$doenca['etiologicalAgent']}}</td>
                                            <td>{{$doenca['transmission']}}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger rounded-pill fas fa-trash" 
                                                    data-toggle="modal" data-target="#excluirPopUp"
                                                    data-id={{$doenca['_id']}}></button>
                                            </td>
                                            <td>
                                                <a href="{{url('doencas/'.$doenca['_id'].'/edit')}}"
                                                    style="text-decoration:none">
                                                    <button type="button"
                                                        class="btn btn-primary rounded-pill fas fa-edit"></button>
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
                                            <button class="btn btn-primary rounded-pill">Adicionar Doença</button>
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
</main>

@endsection