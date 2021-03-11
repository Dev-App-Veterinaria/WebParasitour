@extends('templates.template')

@section('conteudo')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
   <h1>Doenças</h1>

   <form action name="create" id="create" method="post" action="{{route('registrar')}}">
   @csrf
    <div class="form-group">
        <label class="form-control-label col-sm-2" for="name" >Nome:</label>
        <div class="col-sm-10">
        <input required type="text" class="form-control" id="name" name= "name"
            placeholder='Digite o nome' value="{{$usuario->name ?? ''}}">
        </div>
    </div>
    
    <div class="form-group t-10">
        <label class="control-label col-sm-2" for="etiologicalAgent">Agente Epidemiológico:</label>
        <div class="col-sm-10">
        <input required type="text" class="form-control" id="etiologicalAgent" name= "etiologicalAgent" placeholder="Digite o nome do Agente Epidemiológico" value="{{$usuario->email ?? ''}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="scientificName">Nome Cientifico:</label>
        <div class="col-sm-10">
            <input required type="text" class="form-control" id="scientificName" name= "scientificName" placeholder="Digite o nome cientifico" value="{{$usuario->password ?? ''}}">
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="vector">Vetor:</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" id="vector" name= "vector" placeholder="Digite o Vetor" value="{{$usuario->email ?? ''}}">
          </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lifeCycle">Ciclo de vida:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="lifeCycle" name= "lifeCycle" placeholder="Digite o Ciclo de vida" value="{{$usuario->email ?? ''}}">
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="transmission">Transmissão:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="transmission" name= "transmission" placeholder="Digite a transmissão" value="{{$usuario->password ?? ''}}">
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="clinicalManifestation">Manifestação clínica:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="clinicalManifestation" name= "clinicalManifestation" placeholder="Digite a manifestação clínica" value="{{$usuario->password ?? ''}}">
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="complications">Complicações:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="complications" name= "complications" placeholder="Digite as complicações" value="{{$usuario->password ?? ''}}">
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="distribution">Distribuição:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="distribution" name= "distribution" placeholder="Digite a distribuição" value="{{$usuario->password ?? ''}}">
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="states">Estados:</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="states" name= "states" placeholder="Digite o estado" value="{{$usuario->password ?? ''}}">
                </div>
    </div>
    </div>
    <button style="margin: 3% 50%" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script 
type="text/javascript">  
$('#form').submit(function (evt) {
    evt.preventDefault();
}); 
</script>
@endsection