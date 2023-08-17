<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    
</head>
<body>
    <div style="text-align: center;">

        <div class="login-container">
            <h1>Login</h1>
            
            @if (session('sucesso'))
                <div>{{ session('sucesso') }}</div>
            @endif
            
            @if (session('erro'))
                <div>{{ session('erro') }}</div>
            @endif
            
            @if ($errors)
                @foreach ($errors->all() as $erro)
                    <div class="error">{{ $erro }}</div>
                @endforeach
            @endif
            
            <form action="{{ url()->current() }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="submit" value="Entrar">
                </div>
            </form>
            
            <div>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></div>
            <div><a href="{{ route('home') }}">Voltar</a></div>
        </div>

    </div>
</body>
</html>
