<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Aplicativo')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agenda Telefônica</h1>
        </div>
        <nav>
            <ul>
                <a href="{{ route('contatos.index') }}">Contatos</a>
                <a href="{{ route('contatos.create') }}">Adicionar Contato</a>
                <a href="{{ route('enderecos.create') }}">Adicionar Endereço</a>
                <a href="{{ route('telefones.create') }}">Adicionar Telefone</a>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Agenda Telefônica</p>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
