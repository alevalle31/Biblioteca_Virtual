<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 2</title>

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <!-- Agrega los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Agrega tus propios estilos -->
    <link rel="stylesheet" href="styles.css">


</head>
<body>

<!-- Contenedor principal -->
<div class="container-fluid">
    <br>
    <br>
    <center><h1 style="font-family: 'Century Schoolbook'">Bienvenido a su biblioteca virtual</h1></center>
    <br>
    <div class="row row-cols-1 row-cols-md-3 g-2">

        <div class="col">
            <div class="card">
                <center><img src="{{asset('imagen/brand/libro.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
                <div class="card-body">
                    <center><a href="{{ route('libro.index') }}" class="btn btn-lg btn-success" style="font-family:Gabriola">Libros</a></center>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <center><img src="{{asset('imagen/brand/usuario.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
                <div class="card-body">
                    <center><a href="{{ route('usuario.index') }}" class="btn btn-lg btn-success" style="font-family: Gabriola">Usuarios</a></center>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card">
                <center><img src="{{asset('imagen/brand/pres.jpeg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
                <div class="card-body">
                    <center><a href="{{ route('prestamo.index') }}" class="btn btn-lg btn-success" style="font-family:Gabriola">Prestamos</a></center>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>
</html>
