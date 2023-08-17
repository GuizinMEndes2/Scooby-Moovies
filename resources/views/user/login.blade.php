<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <h1>Login</h1>

            @if (session('sucesso'))
                <div class="success-message">{{ session('sucesso') }}</div>
            @endif

            @if (session('erro'))
                <div class="error-message">{{ session('erro') }}</div>
            @endif

            @if ($errors)
                <div class="error-messages">
                    @foreach ($errors->all() as $erro)
                        <div class="error">{{ $erro }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url()->current() }}" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="input-field">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha" class="input-field">
                </div>
                <div class="form-group">
                    <input type="submit" value="Entrar" class="login-button">
                </div>
            </form>

            <div class="signup-link">Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></div>
            <div class="back-link"><a href="{{ route('home') }}">Voltar</a></div>
        </div>
    </div>
</body>
</html>
