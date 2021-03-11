@extends('templates.template')

@section('conteudo')
<div class="jumbotron text-center">
    <h1>Doenças</h1>
</div>
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
                    <a href="{{url('doenca/'.$doenca['_id'].'/edit')}}" style="text-decoration:none">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-toggle="modal" data-target="#excluirPopUp" data-id={{$doenca['_id']}}>Excluir</button>
                </td>
            </tr>
            @empty
            <tr>ERRO NO SERVIDOR</tr>
            @endforelse
        </tbody>
    </table>

</div>
<div class="container">
    <a href="{{url('doencas/create')}}" style="text-decoration:none">
        <button type="button" class="btn btn-success btn-block">Adicionar Doença</button>
    </a>
</div>
<!-- Pop-up para confirmação de exclusão -->
<div class="modal fade" id="excluirPopUp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Excluir doença</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que você deseja excluir essa doença?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="botaoExcluir" style="text-decoration:none">
                    <button type="button" class="btn btn-danger">Excluir doença</button>
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
        var url = recipient
        modal.find('.botaoExcluir').attr('href', url)
    })
</script>
@endsection