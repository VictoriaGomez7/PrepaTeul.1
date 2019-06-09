
<html>
    <head>
        <title>Prepa Teul -@yield('title')</title>

        {{-- ESTOS LINKS SON PARA BORRAR LAS ALERTAS DE LA VALIDACION --}}
        <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="icon" href="/images/inscono.ico">


    </head>

    <body>

        @yield('frameTitulo')
        @yield('content')
        @yield('eliminar')
        @yield('frameDocentes')
        @yield('frameMaterias')
        @yield('ModificarMaterias')
        @yield('ModificarMateriasD')
        @yield('ModificarAlumnos')
        @yield('ModificarAlumnosD')
        @yield('VerListas')
        @yield('BuscarListas')

    </body>
</html>