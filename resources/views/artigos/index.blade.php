@extends('template.template')

@section('conteudo')
    <div class="jumbotron text-center">
        <h1>Artigos</h1>
    </div>

    <div class="container">
    @csrf
    <!-- Tabela com os usuários -->
        <table class="table table-striped">
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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-toggle="modal"
                                data-target="#excluirPopUp" data-id={{$artigo['_id']}}>Excluir
                        </button>
                    </td>
                    <td>
                        <a href="{{url('artigos/'.$artigo['_id'].'/edit')}}" style="text-decoration:none">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="container">
        <a href="{{url('artigos/create')}}" style="text-decoration:none">
            <button type="button" class="btn btn-success btn-block">Novo Artigo</button>
        </a>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="botaoExcluir" style="text-decoration:none">
                        <button type="button" class="btn btn-danger">Excluir artigo</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script em JS que passa o rapâmetr para o modal -->
    <script type="text/javascript">
        $('#excluirPopUp').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var recipient = button.data('id') // Extrai informação do atributos data-*
            var modal = $(this)
            var url = 'artigos/' + recipient
            modal.find('.botaoExcluir').attr('href', url)
        })
    </script>
@endsection