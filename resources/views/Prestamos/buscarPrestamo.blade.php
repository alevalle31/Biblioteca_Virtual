<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .pagination a {
        display: inline-block;
        margin: 0 5px;
        padding: 10px 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        color: #333;
    }

    .pagination a:hover,
    .pagination a:focus {
        background-color: #f5f5f5;
    }

    .pagination .active a {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .pagination .disabled a {
        opacity: .5;
        pointer-events: none;
    }
</style>
<body>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lista de Préstamos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('prestamo.create') }}"> Crear nuevo préstamo</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Buscar Prestamo</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('prestamo.search') }}" method="GET">
                        <div class="form-group">
                            <label for="search">Buscar:</label>
                            <input type="text" class="form-control" name="search" id="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            <br>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Usuario</th>
                    <th>Libro</th>
                    <th>Fecha de solicitud</th>
                    <th>Fecha de préstamo</th>
                    <th>Fecha de devolución</th>
                    <th width="280px">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $prestamo->usuario->nombre }}</td>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>{{ $prestamo->fecha_solicitud }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion }}</td>
                        <td>
                            <form action="{{ route('prestamo.destroy',$prestamo->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('prestamo.edit',$prestamo->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $prestamos->links() !!}



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>
