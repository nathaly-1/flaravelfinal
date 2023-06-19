<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Models\CarritoTd;
use App\Models\Categorium;
use App\Models\Componente;
use App\Models\DetalleVentum;
use App\Models\Marca;
use App\Models\Ventum;
use \App\Http\Controllers\MailController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [ComponenteController::class, 'getComponentes'])
    ->name('imain');

Route::get('/sobre-nosotros', function () {
    return view('Sobre_nosotros');
})->name('sobre');

Route::get('/categorias', [CategoriaController::class, 'getCategorias'])
    ->name('categorias');

Route::get('/paneladm', function () {
    return view('PanelAdmin');
})->name('paneladm');

Route::get('/productos', [ComponenteController::class, 'getCompoentesByCat'])
    ->name('productos');

//MARCAS
Route::get('/marcaslb', [MarcaController::class, 'getMarcas'])
    ->name('marcaslb');
//addmarcas
Route::get('/marcasad', function () {
    return view('PanelAdm.MarcasCA');
})->name('marcasad');

Route::post('/addmarca', function (Illuminate\Http\Request $request) {
    $marca = Marca::create([
        'nombre_marca' => $request->input('nombre_marca'),
        'status' => $request->has('estatus'),
    ]);

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'agregar', 'marca' => $marca]);
})->name('addmarca');

//editmarcas
Route::get('/marcaedit/{id}', [MarcaController::class, 'editar'])->name('marcaedit');


//CARRITOTD
Route::get('/carrito', [\App\Http\Controllers\CarritoController::class, 'getListado'])->name('carrito');

Route::get('/agregarpcarrito/{id}/{cat}', [\App\Http\Controllers\CarritoController::class, 'addcarrito'])->name('agregarpcarrito');

Route::get('/compa-exitosa', function () {
    $carritos = CarritoTd::where('id_usuario', Auth::user()->id)->get();
    $venta = new Ventum();
    $fecha = date('Ymd'); // Obtener la fecha actual en formato YYYYMMDD

    // Obtener el último folio de venta para la fecha actual
    $ultimoFolio = Ventum::where(DB::raw('CONVERT(folio_venta USING utf8mb4) COLLATE utf8mb4_unicode_ci'), 'like', $fecha . '%')
        ->max('folio_venta');

    if ($ultimoFolio) {
        // Obtener el número del último folio y sumarle 1
        $ultimoNumero = (int)substr($ultimoFolio, -4);
        $nuevoNumero = $ultimoNumero + 1;
    } else {
        // Si no hay folios anteriores para la fecha actual, iniciar desde 1
        $nuevoNumero = 1;
    }

    // Formatear el nuevo número con ceros a la izquierda (4 dígitos)
    $nuevoNumeroFormateado = str_pad($nuevoNumero, 4, '0', STR_PAD_LEFT);

    // Generar el folio de venta concatenando la fecha y el nuevo número
    $folioVenta = $fecha . $nuevoNumeroFormateado;
    $venta->folio_venta = $folioVenta;
    $venta->fecha_venta = now(); // Fecha actual
    $venta->id_usuario = Auth::user()->id;
    $venta->total_venta = 0;
    $venta->save();
    $totalVenta = 0; // Variable para almacenar el total de la venta

    foreach ($carritos as $carrito) {
        $detalleVenta = new DetalleVentum();
        $detalleVenta->folio_venta = $venta->folio_venta;
        $detalleVenta->clave_componente = $carrito->clave_componente;
        $detalleVenta->cantidad_componente = $carrito->cantidad;

        // Obtener el componente correspondiente al carrito

        $componente = Componente::findOrFail($carrito->clave_componente);

        // Calcular el precio de venta basado en el precio del componente y la cantidad
        $precioVenta = $componente->precio_actual_componente * $carrito->cantidad;

        $componente->existencia_componente = $componente->existencia_componente - $carrito->cantidad;
        $componente->save();

        $detalleVenta->precio_venta = $precioVenta;

        $detalleVenta->save();

        $totalVenta += $precioVenta; // Sumar el precio de venta al total de la venta
    }

    // Actualizar el total de la venta en el modelo Ventum
    $venta->total_venta = $totalVenta;
    $venta->save();
    $detalleVentaList = DetalleVentum::where('folio_venta', $venta->folio_venta)->get();

    CarritoTd::where('id_usuario', Auth::user()->id)->delete();

    return view('shop.LcompraE', ['detalleVentaList' => $detalleVentaList, 'id_v' => $venta->folio_venta]);
})->name('compa-exitosa');

//GENERACION PDF
Route::get("/factura/{id_v}", function ($id_v) {
    $detalleVentaList = DetalleVentum::where('folio_venta', $id_v)->get();
    $dompdf = App::make("dompdf.wrapper");
    $dompdf->loadView("factura.factura", [
        "nombre" => "Luis Cabrera Benito",
        "detalleVentaList" => $detalleVentaList,
    ]);
    return $dompdf->stream();
})->name('factura');

Route::get("/enviar-factura/{id_v}", [MailController::class, 'enviarCorreo'])
    ->name('enviar.factura');

Route::post('/editmarca', function (Illuminate\Http\Request $request) {
    $marca = Marca::findOrFail($request->input('id_marca'));
    $marca->nombre_marca = $request->input('nombre_marca');
    $marca->status = $request->has('estatus');
    $marca->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $marca]);
})->name('editmarca');

//deletemarca
Route::delete('/marca/{id}', [MarcaController::class, 'eliminar'])->name('marca');


//CATEGORIAS
Route::get('/categoriaslb', function () {
    $categorias = Categorium::where('status_categoria', '1')->get();

    return view('PanelAdm.CategoriaLB', ['categorias' => $categorias]);
})->name('categoriaslb');
//delete
Route::delete('/categoriaborrar/{id}', [CategoriaController::class, 'eliminar'])->name('categoriaborrar');

//edit
Route::get('/categoriaedit/{id}', [CategoriaController::class, 'editar'])->name('categoriaedit');

Route::post('/editcategoria', function (Illuminate\Http\Request $request) {
    $categoria = Categorium::findOrFail($request->input('id_categoria'));
    $categoria->nombre_categoria = $request->input('nombre_categoria');
    $categoria->descripcion_categoria = $request->input('descripcion_categoria');
    $categoria->status_categoria = $request->has('estatus');
    $categoria->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $categoria]);
})->name('editcategoria');

//addcategorias
Route::get('/categoriasad', function () {
    return view('PanelAdm.CategoriaCA');
})->name('categoriasad');

Route::post('/addcategorias', function (Illuminate\Http\Request $request) {
    $categoria = Categorium::create([
        'nombre_categoria' => $request->input('nombre_categoria'),
        'descripcion_categoria' => $request->input('descripcion_categoria'),
        'status_categoria' => $request->has('estatus'),
    ]);
    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'agregar', 'marca' => $categoria]);
})->name('addcategorias');

//COMPONENTES
Route::get('/componenteslb', function () {
    $componentes = Componente::all();
    return view('PanelAdm.ComponenteLB', ['componentes' => $componentes]);
})->name('componenteslb');

//delete componentes
Route::delete('/componenteborrar/{id}', [ComponenteController::class, 'eliminar'])->name('componenteborrar');

//edit componentes
Route::get('/componenteedit/{id}', [ComponenteController::class, 'editar'])->name('componenteedit');

Route::post('/editcomponente', function (Illuminate\Http\Request $request) {
    $componente = Componente::findOrFail($request->input('id_componente'));
    $componente->nombre_componente = $request->input('nombre_componente');
    $componente->descripcion_componente = $request->input('descripcion_componente');
    $componente->status_componente = $request->has('estatus');
    $componente->save();

    return view('PanelAdm.Susses', ['tipo' => 'marca', 'action' => 'editar', 'marca' => $componente]);
})->name('editcomponente');

//addcomponentes
Route::get('/componentesad', function () {
    $categorias = Categorium::where('status_categoria', '1')->get();
    $marcas = Marca::where('status', '1')->get();
    return view('PanelAdm.ComponenteCA', ['categorias' => $categorias, 'marcas' => $marcas]);
})->name('componentesad');

Route::post('/addcomponentes', function (Illuminate\Http\Request $request) {
    // Validación para asegurarte de que se proporciona una clave de componente
    if (!$request->has('clave_componente')) {
        return redirect()->back()->withInput()->withErrors(['La clave del componente es requerida']);
    }
    $claveComponente = $request->input('clave_componente');
    $imagen = $request->file('imagen');
    $imagenBlob = file_get_contents($imagen);


    $componente = new Componente;
    $componente->clave_componente = $claveComponente;
    $componente->nombre_componente = $request->input('nombre_componente');
    $componente->descripcion_componente = $request->input('descripcion_componente');
    $componente->precio_actual_componente = $request->input('precio_actual_componente');
    $componente->existencia_componente = $request->input('existencia_componente');
    $componente->stock_min_componente = $request->input('stock_min_componente');
    $componente->stock_max_componente = $request->input('stock_max_componente');
    $componente->id_ct_marca = $request->input('id_ct_marca');
    $componente->id_categoria = $request->input('id_categoria');
    $componente->descuento_componente = $request->input('descuento_componente');
    $componente->imagen = $imagenBlob;

    $componente->save();

    return view('PanelAdm.Susses', ['tipo' => 'componente', 'action' => 'agregar', 'componente' => $componente]);
})->name('addcomponentes');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
