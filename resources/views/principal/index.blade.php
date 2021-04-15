@extends('template.template')

@section('conteudo')
@if ($alert = Session::get('alert-success'))
	<div class="alert">
		{{ $alert }}
	</div>
@endif

<div class="page-hero-section bg-image hero-home-1" style="background-image: url(/assets/img/bg_hero_1.svg);">
    <div class="hero-caption pt-5">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 wow fadeInUp">
                    @if(session()->has('token'))
                        <h1 class="mb-4">Gerencie seus<br>dados aqui!</h1>
                        <p class="mb-4">Escolha abaixo a categoria do APP que você deseja gerenciar.</p>
                        <div style="width: 150px;">
                        <a href="/doencas" class="btn btn-primary rounded-pill btn-block">Doenças</a>
                        <a href="/artigos" class="btn btn-primary rounded-pill btn-block">Artigos</a>
                        <a href="/usuarios" class="btn btn-primary rounded-pill btn-block">Usuários</a>
                    @else
                        <h1 class="mb-4">Entre para<br> gerenciar os dados!</h1>
                        <div style="width: 150px;">
                        <a href="/login" class="btn btn-primary rounded-pill btn-block">Login</a>
                    @endif
                        
                    </div>

                </div>
                <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                    <div class="img-place floating-animate">
                        <img src="/assets/img/prototipo.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
