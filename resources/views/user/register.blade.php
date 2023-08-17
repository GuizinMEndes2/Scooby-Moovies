<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ asset('/css/cadast.css') }}">
</head>
<body>
    <div class="register-page">
        <div class="register-container">
            <h1>Cadastro</h1>

            @if ($errors)
                <div class="error-messages">
                    @foreach ($errors->all() as $erro)
                        <div class="error">{{ $erro }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url()->current() }}" method="POST" class="register-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="input-field">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="input-field">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha" class="input-field">
                </div>
                <div class="form-group">
                    <input type="submit" value="Cadastrar" class="register-button">
                </div>
            </form>

            <div class="login-link">Já possui uma conta? <a href="{{ route('login') }}">Logue aqui</a></div>
            <div class="back-link"><a href="{{ route('home') }}">Voltar</a></div>
        </div>
    </div>
</body>
</html>
