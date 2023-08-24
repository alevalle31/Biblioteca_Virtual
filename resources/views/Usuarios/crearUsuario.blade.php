<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h1 class="text-center my-4">Crear Usuario</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('usuario.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="correo_electronico">Correo Electrónico:</label>
                    <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="direccion_usuario">Dirección:</label>
                    <input type="text" name="direccion_usuario" id="direccion_usuario" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
