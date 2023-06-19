<?php

namespace App\Http\Controllers;

use App\Models\CarritoTd;
use App\Models\Categorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function getCategorias(){

        $categorias = Categorium::where('status_categoria', '1')->get();
        if (Auth::check()) {
            $total = CarritoTd::where('id_usuario', Auth::id())->distinct('clave_componente')->count();

            return view('categorias', ['categorias' => $categorias, 'total' => $total]);
        } else {
            $total =0;
            return view('categorias', ['categorias' => $categorias, 'total' => $total]);
        }

    }
    public function eliminar($id)
    {
        $action='eliminar';
        $categoria = Categorium::find($id);
        $categoria->delete();

        return view('PanelAdm/Susses', ['tipo'=>'categoria','action'=>$action, 'categoria'=>$categoria]);
    }
    public function editar($id)
    {
        $categoria = Categorium::find($id);
        return view('PanelAdm.CategoriaUD', ['categoria'=>$categoria]);
    }

}
