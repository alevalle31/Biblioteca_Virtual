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
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h3 class="mb-0">Agregar Nuevo Registro</h3></center>
            </div>
        </div>
    </div>
</div>
    <!-- Formulario para crear -->
<center> <div class="card-body"></div><center></center>
            <form action="{{ route('libro.index') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="titulo"> Titulo:</label>
                        <input type="text" class="form-control" name="titulo"  required value="{{ old('titulo') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" name="autor"  required value="{{ old('autor') }}">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="editorial">Editorial</label>
                        <input type="text" class="form-control" name="editorial"  required value="{{ old('editorial') }}">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="anio">Año Publicación</label>
                        <input type="text" class="form-control" name="anio"  required value="{{ old('anio') }}">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="cantidad_disponible">Cantidad Disponible</label>
                        <input type="text" class="form-control" name="cantidad_disponible"  required value="{{ old('cantidad_disponible') }}">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                <a href="{{route('libro.index')}}" class="btn btn-sm btn-success">Regresar</a>
            </form>
        </div>
    </center>
            <!-- Agrega los scripts de Bootstrap -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>
</html>
