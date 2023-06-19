@extends('index')
@section('principal')
    <link rel="stylesheet" href="style/suscess.css">

    <div class="container">
        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
            <span class="swal2-success-line-tip"></span>
            <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div>
            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
        </div>

        <h2 class="text-center">Productos Vendidos</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0; // Inicializar la variable total
                ?>
                @foreach($detalleVentaList as $detalle)
                    <tr>
                        <td>{{ $detalle->componente->nombre_componente }}</td>
                        <td>{{ $detalle->cantidad_componente }}</td>
                        <td>{{ $detalle->componente->precio_actual_componente }}</td>
                        <td>${{ $detalle->precio_venta }}</td>
                    </tr>
                        <?php
                        $total += $detalle->cantidad_componente * $detalle->precio_venta; // Actualizar el total
                        ?>


                @endforeach
                <tr>
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td class="text-center">${{ $total }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a href="{{route('factura', ['id_v'=>$id_v])}}" class="btn btn-primary btn-lg mt-3">Generar Factura</a>
        </div>

        <div class="text-center">
            <a href="{{route('enviar.factura', ['id_v'=>$id_v])}}" class="btn btn-primary btn-lg mt-3">Enviar Factura al
                correo</a>
        </div>
        <div class="text-center mt-3 mb-5">
            <a href="/" class="btn btn-secondary btn-lg">Volver al Inicio</a>
        </div>
    </div>

@endsection
