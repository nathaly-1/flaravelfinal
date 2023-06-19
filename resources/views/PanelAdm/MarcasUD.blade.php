@extends('index')

@section('principal')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Editar Marca</h1>
                        <form action="{{ route('editmarca') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_marca" class="form-label">ID de la marca</label>
                                <input type="text" class="form-control" id="id_marca" name="id_marca" value="{{ $marca->id_marca }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_marca" class="form-label">Nombre de la marca</label>
                                <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" value="{{ $marca->nombre_marca }}"  required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="estatus" name="estatus" {{ $marca->status ? 'checked' : '' }}>
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
