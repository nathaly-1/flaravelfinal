<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function getMarcas(){
        $marcas = Marca::where('status', '1')->get();
        return view('PanelAdm/MarcasLB', ['marcas' => $marcas]);
    }

    public function eliminar($id)
    {
        $action='eliminar';
        $marca = Marca::find($id);
        $marca->delete();

        return view('PanelAdm/Susses', ['tipo'=>'marca','action'=>$action, 'marca'=>$marca]);
    }
    public function editar($id)
    {
        $marca = Marca::find($id);
        return view('PanelAdm.MarcasUD', ['marca'=>$marca]);
    }

}
