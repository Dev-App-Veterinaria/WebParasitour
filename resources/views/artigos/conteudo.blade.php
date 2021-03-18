@extends('template.template')

@section('conteudo')
    <style>
        #doiDiv{
            visibility: hidden;
        }
    </style>
    <div class="jumbotron text-center">
        <h1>Cadastrar Novo Artigo</h1>
    </div>

    <div class="container">
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
                    <label class="form-control-label col-sm-2" for="nome">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome"
                               placeholder="Digite o nome" value="{{$artigo['name'] ?? ''}}" required>
                    </div>
                </div>

                <div class="form-group t-10">
                    <label class="control-label col-sm-2" for="doi">DOI:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="doi" name="doi"
                               placeholder="Ex. 10.1109/5.771073" value="{{$artigo['doi'] ?? ''}}" onchange="onChangeText()" required>
                    </div>
                </div>

                <div class="form-group t-10" id="doiDiv">
                    <label class="control-label col-sm-2" for="doi">Url final:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="doiUrl" value="" disabled>
                    </div>
                </div>

                <div class="form-group t-10">
                    <label class="control-label col-sm-2" for="citacao">Citação:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="citacao" name="citacao"
                               placeholder="Ex: (SILVA, 2015)" value="{{$artigo['citation'] ?? ''}}" required>
                    </div>
                </div>

                <div class="form-group t-10">
                    <label class="control-label col-sm-2" for="doenca">Doença:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="doenca" name="doenca"
                               placeholder="Digite a doença" value="{{$artigo['disease'] ?? ''}}" required>
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

            <script type="text/javascript">
                function onChangeText(){
                    let string = document.getElementById("doi").value
                    document.getElementById("doiDiv").style.visibility = "visible";
                    document.getElementById("doiUrl").value = "https://doi.org/" + string;
                }

                let estadosRecebidos =  `<?php isset($artigo) ?
                    $estados = implode(',' , $artigo['state']) : $estados = ''; echo $estados;?>`;
                if(estadosRecebidos != ''){
                    let estados = document.getElementsByName('estados[]');
                    for(let i = 0; i< estados.length; i++){
                        if(estadosRecebidos.includes(estados[i].value)){
                            estados[i].checked = true;
                        }
                    }
                }

                let doiString = document.getElementById("doi").value

                if(doiString !== ''){
                    onChangeText()
                }
            </script>
    </div>

@endsection