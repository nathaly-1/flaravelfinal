<?php

namespace App\Http\Controllers;

use App\Models\CarritoTd;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    function addcarrito($id, $cat)
    {
        $carrito = CarritoTd::where('id_usuario', Auth::user()->id)->first();

        if ($carrito) {
            // Verificar si el producto ya está en el carrito
            $productoExistente = CarritoTd::where('id_usuario', Auth::user()->id)
                ->where('clave_componente', $id)
                ->first();

            if ($productoExistente) {
                $productoExistente->cantidad = $productoExistente->cantidad += 1;
                $productoExistente->save();

                return redirect()
                    ->route("productos", ['clave' => $cat])
                    ->with("mensaje", "Cantidad del producto aumentada en el carrito");
            }
        }

        $carrito = new CarritoTd();
        $carrito->id_usuario = Auth::user()->id;
        $carrito->clave_componente = $id;
        $carrito->cantidad = 1;
        $carrito->save();
        //$productoMenos = Componente::where('clave_componente', $id)->first();
        //$productoMenos->existencia_componente=$productoMenos->existencia_componente-1;
        //$productoMenos->save();

        return redirect()
            ->route("productos", ['clave' => $cat])
            ->with("mensaje", "Cantidad del producto aumentada en el carrito");
    }

    function getListado()
    {
        $carritos = CarritoTd::where('id_usuario', Auth::user()->id)->get();


        return view('shop.Lcarrito', ['carritos' => $carritos]);
    }

}
