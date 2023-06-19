<?php

namespace App\Http\Controllers;

use App\Mail\CorreoFactura2;
use App\Models\DetalleVentum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function enviarCorreo($id_v)
    {
        $detalleVentaList = DetalleVentum::where('folio_venta', $id_v)->get();
        $correoFactura = new CorreoFactura2('GRACIAS POR SU COMPRA', $detalleVentaList);
        Mail::to(Auth::user()->email)->send($correoFactura);
        return 'Correo electrónico enviado con éxito';
    }
}
