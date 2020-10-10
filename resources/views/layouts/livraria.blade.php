<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('titulo')</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class= "navbar-brand" href="#">Livraria Online</a>
        </div>
    </nav>

    <div class="container">
        @yield('conteudo')
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src= "{{ asset('js/app.js') }}" ></script>
    </body>
</html>