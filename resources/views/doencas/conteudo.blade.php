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

        .lista li input{
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
        .close{
            flex:1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close:hover {
            background-color: #f44336;
            color: white;
        }
    </style>
<div class="jumbotron text-center">
    <h1>Cadastrar Nova Doença</h1>
</div>

<div class="container">
    @if(isset($errors) && count($errors)>0)
        <div class="text-center alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

    @if(isset($doenca))
        <form action name="edit" id="create" method="post" action="{{url('doencas.update')}}">
        @method('PUT')
    @else
        <form action name="create" id="create" method="post" action="{{url('doencas.store')}}">
    @endif
        @csrf
        <div class="form-group">
            <label class="form-control-label col-sm-2" for="nome">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome"
                       placeholder="Digite o nome" value="{{$doenca['name'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="scientificName">Nome Científico:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="scientificName" name="scientificName"
                       placeholder="Digite o nome científico:" value="{{$doenca['scientificName'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="etiologicalAgent">Agente Etiológico:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etiologicalAgent" name="etiologicalAgent"
                       placeholder="Digite o agente etiológico" value="{{$doenca['etiologicalAgent'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="lifeCycle">Ciclo de Vida:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lifeCycle" name="lifeCycle"
                       placeholder="Digite a doença" value="{{$doenca['lifeCycle'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="vector">Vetor:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="myInput" placeholder="Digite o vetor">
                <span onclick="newElement()" class="btn btn-success btn-group-lg">Add</span>
            </div>

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

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="transmission">Transmissão:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="transmission" name="transmission"
                       placeholder="Digite a transmissão" value="{{$doenca['transmission'] ?? ''}}">
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="clinicalManifestation">Manifestação Clinica:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="clinicalManifestation" name="clinicalManifestation"
                       placeholder="Digite a manifestação clinica" value="{{$doenca['clinicalManifestation'] ?? ''}}">
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="complications">Complicações:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="complications" name="complications"
                       placeholder="Digite as complicações" value="{{$doenca['complications'] ?? ''}}">
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="distribution">Distribuição:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="distribution" name="distribution"
                       placeholder="Digite a distribuição" value="{{$doenca['distribution'] ?? ''}}">
            </div>
        </div>


        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="estados">Estados:</label>
            <div class="col-sm-10">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="estados[]" value="Acre">
                                <label>Acre</label><br>

                                <input type="checkbox" name="estados[]" value="Alagoas">
                                <label>Alagoas</label><br>

                                <input type="checkbox" name="estados[]" value="Amapá">
                                <label>Amapá</label><br>

                                <input type="checkbox" name="estados[]" value="Amazonas">
                                <label>Amazonas</label><br>

                                <input type="checkbox" name="estados[]" value="Bahia">
                                <label>Bahia</label><br>
                            </td>

                            <td>
                                <input type="checkbox" name="estados[]" value="Ceará">
                                <label>Ceará</label><br>

                                <input type="checkbox" name="estados[]" value="Distrito Federal">
                                <label>Distrito Federal</label><br>

                                <input type="checkbox" name="estados[]" value="Espírito Santo">
                                <label>Espírito Santo</label><br>

                                <input type="checkbox" name="estados[]" value="Goiás">
                                <label>Goiás</label><br>

                                <input type="checkbox" name="estados[]" value="Maranhão">
                                <label>Maranhão</label><br>
                            </td>

                            <td>
                                <input type="checkbox" name="estados[]" value="Mato Grosso">
                                <label>Mato Grosso</label><br>

                                <input type="checkbox" name="estados[]" value="Mato Grosso do Sul">
                                <label>Mato Grosso do Sul</label><br>

                                <input type="checkbox" name="estados[]" value="Minas Gerais">
                                <label>Minas Gerais</label><br>

                                <input type="checkbox" name="estados[]" value="Pará">
                                <label>Pará</label><br>

                                <input type="checkbox" name="estados[]" value="Paraíba">
                                <label>Paraíba</label><br>
                            </td>

                            <td>
                                <input type="checkbox" name="estados[]" value="Paraná">
                                <label>Paraná</label><br>

                                <input type="checkbox" name="estados[]" value="Pernambuco">
                                <label>Pernambuco</label><br>

                                <input type="checkbox" name="estados[]" value="Piauí">
                                <label>Piauí</label><br>

                                <input type="checkbox" name="estados[]" value="Rio de Janeiro">
                                <label>Rio de Janeiro</label><br>

                                <input type="checkbox" name="estados[]" value="Rio Grande do Sul">
                                <label>Rio Grande do Sul</label><br>
                            </td>

                            <td>
                                <input type="checkbox" name="estados[]" value="Rio Grande do Norte">
                                <label>Rio Grande do Norte</label><br>

                                <input type="checkbox" name="estados[]" value="Rondônia">
                                <label>Rondônia</label><br>

                                <input type="checkbox" name="estados[]" value="Roraima">
                                <label>Roraima</label><br>

                                <input type="checkbox" name="estados[]" value="Santa Catarina">
                                <label>Santa Catarina</label><br>

                                <input type="checkbox" name="estados[]" value="São Paulo">
                                <label>São Paulo</label><br>
                            </td>

                            <td>
                                <input type="checkbox" name="estados[]" value="Sergipe">
                                <label>Sergipe</label><br>

                                <input type="checkbox" name="estados[]" value="Tocantins">
                                <label>Tocantins</label><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    let estadosRecebidos =  `<?php isset($doenca) ?
        $estados = implode(',' , $doenca['states']) : $estados = ''; echo $estados;?>`;
    if(estadosRecebidos != ''){
        let estados = document.getElementsByName('estados[]');
        for(let i = 0; i< estados.length; i++){
            if(estadosRecebidos.includes(estados[i].value)){
                estados[i].checked = true;
            }
        }
    }
</script>
<script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByTagName("LI");
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
            div.style.display = "none";
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
            alert("You must write something!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close btn-default";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    }
</script>
@endsection