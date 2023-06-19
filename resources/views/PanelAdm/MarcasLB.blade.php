@extends('index')

@section('principal')
    <div class="container my-4">
        <div class="row">

            <div class="col-12 text-center">
                <h1>CONTROL MARCAS</h1>
            </div>
            <div class="col-12">
                <a href="{{ route('marcasad') }}" class="btn btn-primary mb-4">Agregar</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Borrar</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id_marca }}</td>
                            <td>Nombre {{ $marca->nombre_marca }}</td>
                            <td>
                                <form action="{{ route('marca', ['id' => $marca->id_marca]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                            <td><a href="{{ route('marcaedit',['id' => $marca->id_marca]) }}" class="btn btn-warning">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
