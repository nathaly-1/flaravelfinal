@extends('index')

@section('principal')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Editar Categoria</h1>
                        <form action="{{ route('addcategorias') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_categoria" class="form-label">Nombre de la categoria</label>
                                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion_categoria" class="form-label">descripcion de la categoria</label>
                                <textarea class="form-control" id="descripcion_categoria" name="descripcion_categoria" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="estatus" name="estatus">
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
