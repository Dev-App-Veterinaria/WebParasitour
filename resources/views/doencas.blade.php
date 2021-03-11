@extends('templates.template')

@section('conteudo')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
   <h1>Doenças</h1>

   <form action name="create" id="create" method="post" action="{{url('usuario.store')}}">
   @csrf
    <div class="form-group">
        <label class="form-control-label col-sm-2" for="name" >Nome:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name= "name" placeholder="Digite o nome" value="{{$usuario->name ?? ''}}">
        </div>
    </div>
    
    <div class="form-group t-10">
        <label class="control-label col-sm-2" for="etiologicalAgent">Agente Epidemiológico:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="etiologicalAgent" name= "etiologicalAgent" placeholder="Digite o nome do Agente Epidemiológico" value="{{$usuario->email ?? ''}}">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="scientificName">Nome Cientifico:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="scientificName" name= "scientificName" placeholder="Digite o nome cientifico" value="{{$usuario->password ?? ''}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="scientificName">Nome Cientifico:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="scientificName" name= "scientificName" placeholder="Digite o nome cientifico" value="{{$usuario->password ?? ''}}">
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
    <button type="submit"></button>
    </form>
</div>
@endsection