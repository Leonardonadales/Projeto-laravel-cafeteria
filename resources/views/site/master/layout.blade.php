<!DOCTYPE html>
<html lang="pt-BR">
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hideout</title>
    <meta name="description" content="Explore dozenas de variações">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="/img/Logo cafe.jpg" type="imagen/x-icon">
    <link rel="stylesheet" href=../css/layout.css>
    
</head>
<body>
    <body>
        <header class="começo">
            <nav>
                <div class="logo-container">
                    <img class="imagen" src="/img/logo cafe.jpg" width="80">
                    <span class="logo">The Hideout</span>
                </div>
                <ul class="menu">
                <li><a href="{{ route('site.home')}}">Home</a></li>
                <li><a href="{{ route('site.Cafes')}}">Cafés</a></li>
                <li><a href="{{ route('site.salgados')}}">Salgados</a></li>
                <li><a href="{{ route('site.bebidas')}}">Bebidas</a></li>
                <li><a href="{{ route('site.meuspedidos')}}">Meus Pedidos</a></li>
                </ul>
        </nav>
    </header>

    
    <main>
        @yield('content')
    </main>

    <footer>
        <p>Copyright <codecoffee />2024</p>
        &copy;Leonardo Alexander/Bruno Gomes/João Artur
    

    </footer>
</body>
</html>
