<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use App\Models\Componente;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function getComponentes()
    {
        $componentes = Componente::all();
        return view('imain', ['componentes' => $componentes]);
    }

    public function getCompoentesByCat(Request $cat)
    {
        $clave = $cat->input('clave');
        $categorias = Componente::where('id_categoria', $clave)
            ->get();
        return view('producto', ['componentes' => $categorias, 'cat'=>$clave]);

    }
    public function eliminar($id)
    {
        $action='eliminar';
        $componente = Componente::find($id);
        $componente->delete();

        return view('PanelAdm/Susses', ['tipo'=>'componente','action'=>$action, 'componente'=>$componente]);
    }
    public function editar($id)
    {
        $componente = Componente::find($id);
        return view('PanelAdm.ComponentesUD', ['componente'=>$componente]);
    }
}
