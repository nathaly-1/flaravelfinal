@extends('index')

@section('principal')
    <div class="container my-4">
        <div class="row">

            <div class="col-12 text-center">
                <h1>CONTROL COMPONENTES</h1>
            </div>
            <div class="col-12">
                <a href="{{ route('componentesad') }}" class="btn btn-primary mb-4">Agregar</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Stock Mínimo</th>
                        <th>Stock Máximo</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($componentes as $componente)
                        <tr>
                            <td>{{ $componente->clave_componente }}</td>
                            <td>{{ $componente->nombre_componente }}</td>
                            <td>{{ $componente->descripcion_componente }}</td>
                            <td>{{ $componente->precio_actual_componente }}</td>
                            <td>{{ $componente->existencia_componente }}</td>
                            <td>{{ $componente->stock_min_componente }}</td>
                            <td>{{ $componente->stock_max_componente }}</td>
                            <td>
                                <img src="{{ $componente->imagen }}" alt="Imagen del componente" width="100">
                            </td>
                            <td>
                                <form action="{{ route('componenteborrar', ['id' => $componente->clave_componente]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                                <a href="{{ route('componenteedit',['id' => $componente->clave_componente]) }}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
