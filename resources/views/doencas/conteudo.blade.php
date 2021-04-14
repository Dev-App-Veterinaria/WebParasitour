@extends('template.template')

@section('conteudo')

<style>
    /* Remove margins and padding from the list */
    .lista {
        margin: 0;
        padding: 0;
    }

    /* Style the list items */
    .lista li {
        display: flex;
        flex-direction: row;
        flex-grow: 1;
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 8px;
        list-style-type: none;
        background: #eee;
        font-size: 18px;
        transition: 0.2s;

        /* make the list items unselectable */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .lista li input {
        flex: 10;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    .lista li:nth-child(odd) {
        background: #f9f9f9;
    }

    /* Darker background-color on hover */
    .lista li:hover {
        background: #ddd;
    }

    /* Style the close button */
    .close {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close:hover {
        background-color: #f44336;
        color: white;
    }
</style>

<main class="bg-light">

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h1 class="mb-4 fw-bold">Doença</h1>
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
                            <h5 class="fg-primary">Doença</h5>

                            </style>


                            @if(isset($errors) && count($errors)>0)
                            <div class="text-center alert-danger">
                                @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                                @endforeach
                            </div>
                            @endif

                            @if(isset($doenca))
                            <form class="form-group" action name="edit" id="create" method="post"
                                action="{{url('doencas.update')}}">
                                @method('PUT')
                                @else
                                <form class="form-group" action name="create" id="create" method="post"
                                    action="{{url('doencas.store')}}">
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2" for="nome">Nome:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                placeholder="Digite o nome" value="{{$doenca['name'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="scientificName">Nome
                                            Científico:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="scientificName"
                                                name="scientificName" placeholder="Digite o nome científico:"
                                                value="{{$doenca['scientificName'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="etiologicalAgent">Agente
                                            Etiológico:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="etiologicalAgent"
                                                name="etiologicalAgent" placeholder="Digite o agente etiológico"
                                                value="{{$doenca['etiologicalAgent'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="lifeCycle">Ciclo de Vida:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lifeCycle" name="lifeCycle"
                                                placeholder="Digite a doença" value="{{$doenca['lifeCycle'] ?? ''}}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="vector">Vetor:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="myInput"
                                                placeholder="Digite o vetor"><br>
                                            <span onclick="newElement()" class="btn btn-primary rounded-pill">Adicionar
                                                vetor</span>
                                        </div>

                                        <div class="col-sm-5">
                                            <ul id="tableUL" class="lista">
                                                @if(isset($doenca))
                                                    @foreach( $doenca['vector'] as $vector)
                                                        <li>
                                                            <input class="form-control" name="vector[]" value="{{$vector ?? ''}}">
                                                            <span class="close">x</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="transmission">Transmissão:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="transmission"
                                                name="transmission" placeholder="Digite a transmissão"
                                                value="{{$doenca['transmission'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="clinicalManifestation">Manifestação
                                            Clinica:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="clinicalManifestation"
                                                name="clinicalManifestation" placeholder="Digite a manifestação clinica"
                                                value="{{$doenca['clinicalManifestation'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="complications">Complicações:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="complications"
                                                name="complications" placeholder="Digite as complicações"
                                                value="{{$doenca['complications'] ?? ''}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group t-10">
                                        <label class="control-label col-sm-2" for="distribution">Distribuição:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="distribution"
                                                name="distribution" placeholder="Digite a distribuição"
                                                value="{{$doenca['distribution'] ?? ''}}" required>
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
    //Inicialização das informações
    let estadosRecebidos = `<?php isset($doenca) ?
            $estados = implode(',' , $doenca['states']) : $estados = ''; echo $estados;?>`;
    if (estadosRecebidos != '') {
        let estados = document.getElementsByName('estados[]');
        for (let i = 0; i < estados.length; i++) {
            if (estadosRecebidos.includes(estados[i].value)) {
                estados[i].checked = true;
            }
        }
    }

    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByName("vector[]");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }


    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            $(div).remove();
        }
    }

    // Create a new list item when clicking on the "Add" button
    function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createElement("input");
        t.value = inputValue;
        t.setAttribute("class", "form-control");
        t.setAttribute("name", "vector[]");
        li.appendChild(t);

        if (inputValue === '') {
            alert("Você deve digitar algo!");
        } else {
            document.getElementById("tableUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                $(div).remove();
            }
        }
}

    document.getElementById('btnSalvar').addEventListener('click', (event) => {
        let checkBoxInputs = document.getElementsByName('estados[]')
        let tableElements = document.getElementById('tableUL').childElementCount
        let selected = 0
        checkBoxInputs.forEach(a => {
            if(a.checked){
                selected++
            }
        })
        if(tableElements < 1){
            document.getElementById('myInput').focus()
            alert("Você deve adicionar algum vetor!")
            event.preventDefault()
        }else if(selected < 1){
            document.getElementById('tabelaEstados').focus()
            alert("Você deve selecionar algum estado!")
            event.preventDefault()
        }
    })
</script>

@endsection