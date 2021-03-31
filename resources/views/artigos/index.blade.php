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
                            <div class="container d-flex flex-row-reverse">
                                <div id="pagination-wrapper"></div>
                            </div>
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
                                    <tbody id="table-body">

                                    </tbody>
                                </table>
                            </div>

                            <br>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 py-4">
                                    <div class="team-item">
                                        <a href="{{url('artigos/create')}}" style="text-decoration:none">
                                            <button class="btn btn-primary rounded-pill">Adicionar Artigo</button>
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
</main>
<script>
//Recebendo dador do PHP
<?php
    $artigosJson;
    isset($artigos) ? $artigosJson = json_encode($artigos) : $artigosJson = [];?>
let artigos = <?php echo $artigosJson?>;
var state = {
    'querySet': artigos,

    'page': 1,
    'rows': 5,
    'window': 5,
}

buildTable()

function pagination(querySet, page, rows) {

    var trimStart = (page - 1) * rows
    var trimEnd = trimStart + rows
    var trimmedData = querySet.slice(trimStart, trimEnd)
    var pages = Math.round(querySet.length / rows);

    return {
        'querySet': trimmedData,
        'pages': pages,
    }
}

function pageButtons(pages) {
    var wrapper = document.getElementById('pagination-wrapper')

    wrapper.innerHTML = ``

    var maxLeft = (state.page - Math.floor(state.window / 2))
    var maxRight = (state.page + Math.floor(state.window / 2))

    if (maxLeft < 1) {
        maxLeft = 1
        maxRight = state.window
    }

    if (maxRight > pages) {
        maxLeft = pages - (state.window - 1)

        if (maxLeft < 1) {
            maxLeft = 1
        }
        maxRight = pages
    }



    for (var page = maxLeft; page <= maxRight; page++) {
        let btnClass = "btn-primary";
        if (state.page == page) {
            btnClass = "btn-light";
        }
        wrapper.innerHTML += `<button value=${page} class="page btn ${btnClass} rounded-pill">${page}</button>`
    }

    if (state.page != 1) {
        wrapper.innerHTML = `<button value=${1} class="page btn btn-primary rounded-pill">&#171; Inicio</button>` +
            wrapper
            .innerHTML
    }

    if (state.page != pages) {
        wrapper.innerHTML += `<button value=${pages} class="page btn btn-primary rounded-pill">Fim &#187;</button>`
    }

    $('.page').on('click', function() {
        $('#table-body').empty()

        state.page = Number($(this).val())

        buildTable()
    })

}


function buildTable() {
    let table = $('#table-body')
    let ref = "<?php echo url('artigos/') ?>";
    let data = pagination(state.querySet, state.page, state.rows);
    let myList = data.querySet;

    for (var i = 0 in myList) {
        //Keep in mind we are using "Template Litterals to create rows"
        let row = `<tr>
        <th scope="row">${myList[i].doi}</th>
        <td>${myList[i].name}</td>
        <td>${myList[i].disease}</td>
        <td>
            <button type="button" class="btn btn-danger rounded-pill fas fa-trash" 
                data-toggle="modal" data-target="#excluirPopUp"
                data-id=${myList[i]._id}></button>
        </td>
        <td>
            <a href="${ref}/${myList[i]._id}/edit"
                style="text-decoration:none">
                <button type="button"
                    class="btn btn-primary rounded-pill fas fa-edit"></button>
            </a>
        </td>
              `
        table.append(row)
    }

    pageButtons(data.pages)
}
</script>
@endsection