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
@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
<div class="container">
    <h1 class="text-center my-4" style="font-family: 'Eras Medium ITC'">Lista de Prestamos</h1>

    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-right">
                    <a href="{{route('prestamo.create')}}" class="btn btn-sm btn-success">Agregar Prestamo</a>
                    <a href="{{route('principal')}}" class="btn btn-sm btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('prestamo.buscar') }}" method="GET" role="buscar">
        <div class="input-group">
            <input type="text" class="form-control" name="buscar" placeholder="Buscar " value="{{ request()->input('buscar') }}">
            <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </span>
              </div>
    </form>



    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha Solicitud</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Devolución</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->id }}</td>
                <td>{{ $prestamo->libro->titulo}}</td>
                <td>{{ $prestamo->usuario->nombre}}</td>
                <td>{{ $prestamo->fecha_solicitud }}</td>
                <td>{{ $prestamo->fecha_prestamo }}</td>
                <td>{{ $prestamo->fecha_devolucion }}</td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-warning" href="{{ route('prestamo.edit', $prestamo->id) }}">Editar</a>
                    <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $prestamos->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

