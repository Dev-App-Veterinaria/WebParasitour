@extends('template.template')

@section('conteudo')

<style>
#doiDiv {
    visibility: hidden;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/favicon3.png" alt="" width="40%">
        </a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
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

            <div class="col-sm-5">
                <ul class="lista" id="myUL">
                    @if(isset($doenca))
                    @foreach( $doenca['vector'] as $vector)
                    <li><input class="form-control" name="vector[]" value="{{$vector ?? ''}}"></li>
                    @endforeach
                    @endif
                </ul>
            </div>

        </div>
    </div>
</nav>

<main class="bg-light">

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h1 class="mb-4 fw-bold">Artigo</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">

                    <div class="card-page mt-2">

                        <div class="card-page">
                            <h5 class="fg-primary">Artigo</h5>

                            @if(isset($errors) && count($errors)>0)
                            <div class="text-center alert-danger">
                                @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                                @endforeach
                            </div>
                            @endif

                            @if(isset($artigo))
                            <form action name="edit" id="create" method="post" action="{{url('artigo.update')}}">
                                @method('PUT')
                                @else
                                <form action name="create" id="create" method="post" action="{{url('artigo.store')}}">
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2" for="nome">Título:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                placeholder="Digite o nome" value="{{$artigo['name'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="doi">DOI:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="doi" name="doi"
                                                placeholder="Ex: 10.1109/5.771073" value="{{$artigo['doi'] ?? ''}}"
                                                onchange="onChangeText()" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10" id="doiDiv">
                                        <label class="control-label col-sm-2" for="doi">URL de acesso:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="doiUrl" value="" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="citacao">Citação:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="citacao" name="citacao"
                                                placeholder="Ex: (SILVA, 2015)" value="{{$artigo['citation'] ?? ''}}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="doenca">Doença:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="doenca" name="doenca"
                                                placeholder="Digite a doença" value="{{$artigo['disease'] ?? ''}}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="estados">Estados:</label>
                                        <div class="col-sm-10" tabindex="0" id="tabelaEstados">
                                            <table class="table table-borderless table-responsive-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="estados[]" value="Acre">
                                                            <label>AC</label><br>

                                                            <input type="checkbox" name="estados[]" value="Alagoas">
                                                            <label>AL</label><br>

                                                            <input type="checkbox" name="estados[]" value="Amapá">
                                                            <label>AP</label><br>

                                                            <input type="checkbox" name="estados[]" value="Amazonas">
                                                            <label>AM</label><br>

                                                            <input type="checkbox" name="estados[]" value="Bahia">
                                                            <label>BA</label><br>
                                                        </td>

                                                        <td>
                                                            <input type="checkbox" name="estados[]" value="Ceará">
                                                            <label>CE</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Distrito Federal">
                                                            <label>DF</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Espírito Santo">
                                                            <label>ES</label><br>

                                                            <input type="checkbox" name="estados[]" value="Goiás">
                                                            <label>GO</label><br>

                                                            <input type="checkbox" name="estados[]" value="Maranhão">
                                                            <label>MA</label><br>
                                                        </td>

                                                        <td>
                                                            <input type="checkbox" name="estados[]" value="Mato Grosso">
                                                            <label>MT</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Mato Grosso do Sul">
                                                            <label>MS</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Minas Gerais">
                                                            <label>MG</label><br>

                                                            <input type="checkbox" name="estados[]" value="Pará">
                                                            <label>PA</label><br>

                                                            <input type="checkbox" name="estados[]" value="Paraíba">
                                                            <label>PB</label><br>
                                                        </td>

                                                        <td>
                                                            <input type="checkbox" name="estados[]" value="Paraná">
                                                            <label>PR</label><br>

                                                            <input type="checkbox" name="estados[]" value="Pernambuco">
                                                            <label>PE</label><br>

                                                            <input type="checkbox" name="estados[]" value="Piauí">
                                                            <label>PI</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Rio de Janeiro">
                                                            <label>RJ</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Rio Grande do Sul">
                                                            <label>RS</label><br>
                                                        </td>

                                                        <td>
                                                            <input type="checkbox" name="estados[]"
                                                                value="Rio Grande do Norte">
                                                            <label>RN</label><br>

                                                            <input type="checkbox" name="estados[]" value="Rondônia">
                                                            <label>RO</label><br>

                                                            <input type="checkbox" name="estados[]" value="Roraima">
                                                            <label>RR</label><br>

                                                            <input type="checkbox" name="estados[]"
                                                                value="Santa Catarina">
                                                            <label>SC</label><br>

                                                            <input type="checkbox" name="estados[]" value="São Paulo">
                                                            <label>SP</label><br>

                                                        </td>

                                                        <td>

                                                            <input type="checkbox" name="estados[]" value="Sergipe">
                                                            <label>SE</label><br>

                                                            <input type="checkbox" name="estados[]" value="Tocantins">
                                                            <label>TO</label><br>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 py-4">
                                            <div class="team-item">
                                                <button type="submit" class="btn btn-primary rounded-pill" id="btnSalvar">⠀⠀Salvar⠀⠀
                                                </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function onChangeText() {
        let string = document.getElementById("doi").value
        document.getElementById("doiDiv").style.visibility = "visible";
        document.getElementById("doiUrl").value = "https://doi.org/" + string;
    }

    let estadosRecebidos = `<?php isset($artigo) ?
                        $estados = implode(',' , $artigo['state']) : $estados = ''; echo $estados;?>`;
    if (estadosRecebidos != '') {
        let estados = document.getElementsByName('estados[]');
        for (let i = 0; i < estados.length; i++) {
            if (estadosRecebidos.includes(estados[i].value)) {
                estados[i].checked = true;
            }
        }
    }

    let doiString = document.getElementById("doi").value

    if (doiString !== '') {
        onChangeText()
    }

    document.getElementById('btnSalvar').addEventListener('click', (event) => {
        let checkBoxInputs = document.getElementsByName('estados[]')
        let selected = 0
        checkBoxInputs.forEach(a => {
            if(a.checked){
                selected++
            }
        })
        if(selected < 1){
            document.getElementById('tabelaEstados').focus()
            alert("Você deve selecionar algum estado!")
            event.preventDefault()
        }
    })
</script>

@endsection