@extends('template.template')

@section('conteudo')
    <style>
        .padding-left-17 {
            padding-left: 17px;
        }
        .padding-left-10 {
            padding-left: 10px;
        }
    </style>
<main class="bg-light">

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h1 class="mb-4 fw-bold">Usuário</h1>
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
                            <h5 class="fg-primary">Usuário</h5>
                            </style>

                            <form class="form-group" action name="edit" id="create" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label col-sm-2" for="name">Nome:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Digite o nome" value="{{$usuario['name'] ?? ''}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email"
                                        name="email" placeholder="Digite o email"
                                        value="{{$usuario['email'] ?? ''}}" required>
                                </div>
                            </div>

                            <div class="form-group t-10">
                                <label class="control-label col-sm-2" for="password">Senha:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control password" id="password"
                                        name="password" placeholder="Digite a senha" required>
                                    <br>
                                    <div class="row align-content-center padding-left-17">
                                        <input type="checkbox" onclick="show()" value>
                                        <label class="padding-left-10">Mostrar senha</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group t-10">
                                <label class="control-label col-sm-2" for="confirm-password">Confirmar Senha:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control password" id="confirm-password" name="confirm-password"
                                        placeholder="Digite a senha novamente">
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
    <script>
        document.getElementById('btnSalvar').addEventListener('click', (event) => {
            let password = document.getElementById('password').value
            let confirmPassword = document.getElementById('confirm-password').value

            if(!(password.length >= 8)){
                document.getElementById('password').focus()
                alert("A senha deve conter ao menos 8 caracteres")
                event.preventDefault()
            }else if (!(confirmPassword.length >= 8)){
                document.getElementById('confirm-password').focus()
                alert("A confirmação da senha deve conter ao menos 8 caracteres")
                event.preventDefault()
            }else if (password !== confirmPassword){
                document.getElementById('password').focus()
                alert("Senhas não conferem")
                event.preventDefault()
            }
        })

        function show() {
            let inputs = document.getElementsByClassName("password");
            Array.prototype.forEach.call(inputs, a => {
                if (a.type === "password") {
                    a.type = "text";
                } else {
                    a.type = "password";
                }
            })
        }
    </script>

@endsection