<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un nuevo libro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>


<body>

<div class="container">
    <h1>Resultados de la búsqueda</h1>
    @if ($libros->isEmpty())
        <p>No se encontraron resultados</p>
    @else
        <ul>
            @foreach ($libros as $libro)
                <li>{{ $libro->nombre }}</li>
            @endforeach
        </ul>
    @endif
</div>

<!-- Agrega los scripts de Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>
</html>
