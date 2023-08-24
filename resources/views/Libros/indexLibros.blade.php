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
        background-color: #0033ff;
        border-color: #0048ff;
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
    <h1 class="text-center my-4" style="font-family:'Tw Cen MT Condensed Extra Bold'">Lista de Libros</h1>
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-right">
                    <a href="{{route('libros.create')}}" class="btn btn-sm btn-success" >Agregar Libro</a>
                    <a href="{{route('principal')}}" class="btn btn-sm btn-secondary">Regresar</a>
            </div>
        </div>
    </div>
</div>

    <form method="GET" action="{{ route('libros.buscar') }}">
        <div class="input-group mb-3">
            <input type="text" name="titulo" class="form-control" placeholder="Buscar por título">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </div>
    </form>



    <div class="table-responsive">
        <table class="table align-items-center table-striped">
            <thead class="thead-light">
            <tr>
                <th></th>

                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Editorial</th>
                <th scope="col">Año Publicación</th>
                <th scope="col">Cantidad Disponible</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($libros as $libro)
                <tr>

                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->editorial }}</td>
                    <td>{{ $libro->anio }}</td>
                    <td>{{ $libro->cantidad_disponible }}</td>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-info" href="{{ route('libros.edit', $libro->id) }}">Editar</a>
                        <form action="{{ route('libros.update', $libro->id) }}" method="POST">
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
                {{ $libros->links('pagination::bootstrap-4') }}

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
