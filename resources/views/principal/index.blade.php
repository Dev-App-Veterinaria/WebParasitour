@extends('template.template')

@section('conteudo')

<!-- Barra superior -->
<nav class="navbar navbar-expand-lg navbar-light navbar-floating">
    <div class="container">
        <img src="/assets/favicon2.png" alt="" width="30%">
    </div>
</nav>

<!-- Corpo -->
<div class="page-hero-section bg-image hero-home-1" style="background-image: url(/assets/img/bg_hero_1.svg);">
    <div class="hero-caption pt-5">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 wow fadeInUp">
                    <h1 class="mb-4">Gerencie seus<br>dados aqui!</h1>
                    <p class="mb-4">Escolha abaixo a categoria do APP que você deseja gerenciar.</p>
                    <div style="width: 150px;">
                        <a href="/doencas" class="btn btn-primary rounded-pill btn-block">Doenças</a>
                        <a href="/artigos" class="btn btn-primary rounded-pill btn-block">Artigos</a>
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