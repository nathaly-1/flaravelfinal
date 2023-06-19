@extends('index')

@section('principal')
    <div class="container my-4">
        <div class="row">

            <div class="col-12 text-center">
                <h1>CONTROL CATEGORIAS</h1>
            </div>
            <div class="col-12">
                <a href="{{ route('categoriasad') }}" class="btn btn-primary mb-4">Agregar</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>descripcion</th>
                        <th>Borrar</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id_categoria }}</td>
                            <td>Nombre {{ $categoria->nombre_categoria }}</td>
                            <td>{{ $categoria->descripcion_categoria }}</td>
                            <td>
                                <form action="{{ route('categoriaborrar', ['id' => $categoria->id_categoria]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                            <td><a href="{{ route('categoriaedit',['id' => $categoria->id_categoria]) }}" class="btn btn-warning">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
