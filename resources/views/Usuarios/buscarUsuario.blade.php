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
    <div class="row">
        <div class="col-md-12">
            <h2>Buscar Usuarios</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('usuario.search') }}" method="GET">
                        <div class="form-group">
                            <label for="search">Buscar:</label>
                            <input type="text" class="form-control" name="search" id="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4>Resultados:</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->correo_electronico }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->direccion_usuario }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

