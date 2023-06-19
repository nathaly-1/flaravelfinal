@extends('index')

@section('principal')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Editar Categoria</h1>
                        <form action="{{ route('editcategoria') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_categoria" class="form-label">ID de la marca</label>
                                <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="{{ $categoria->id_categoria }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_categoria" class="form-label">Nombre de la marca</label>
                                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="{{ $categoria->nombre_categoria }}"  required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion_categoria" class="form-label">descripcion de la marca</label>
                                <textarea class="form-control" id="descripcion_categoria" name="descripcion_categoria" required>{{ $categoria->descripcion_categoria }}</textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="estatus" name="estatus" {{ $categoria->status_categoria ? 'checked' : '' }}>
                                <label class="form-check-label" for="estatus">Activo</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
