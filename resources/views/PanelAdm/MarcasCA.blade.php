@extends('index')
@section('principal')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Agregar Marca</h1>
                        <form action="{{ route('addmarca') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_marca" class="form-label">Nombre de la marca</label>
                                <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="estatus" name="estatus">
                                <label class="form-check-label" for="status">Activo</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
