<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Componente
 * 
 * @property string $clave_componente
 * @property string $nombre_componente
 * @property string $descripcion_componente
 * @property float $precio_actual_componente
 * @property int $existencia_componente
 * @property int $stock_min_componente
 * @property int $stock_max_componente
 * @property int $id_ct_marca
 * @property int $id_categoria
 * @property float $descuento_componente
 * @property string|null $imagen
 * 
 * @property Categorium $categorium
 * @property Marca $marca
 * @property Collection|CaracteristicasPCategoriadetalle[] $caracteristicas_p_categoriadetalles
 * @property Collection|CaracteristicasPComponente[] $caracteristicas_p_componentes
 * @property Collection|CarritoTd[] $carrito_tds
 * @property Collection|DetalleCompra[] $detalle_compras
 * @property Collection|DetalleVentum[] $detalle_venta
 *
 * @package App\Models
 */
class Componente extends Model
{
	protected $table = 'componente';
	protected $primaryKey = 'clave_componente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'precio_actual_componente' => 'float',
		'existencia_componente' => 'int',
		'stock_min_componente' => 'int',
		'stock_max_componente' => 'int',
		'id_ct_marca' => 'int',
		'id_categoria' => 'int',
		'descuento_componente' => 'float'
	];

	protected $fillable = [
		'nombre_componente',
		'descripcion_componente',
		'precio_actual_componente',
		'existencia_componente',
		'stock_min_componente',
		'stock_max_componente',
		'id_ct_marca',
		'id_categoria',
		'descuento_componente',
		'imagen'
	];

	public function categorium()
	{
		return $this->belongsTo(Categorium::class, 'id_categoria');
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'id_ct_marca');
	}

	public function caracteristicas_p_categoriadetalles()
	{
		return $this->hasMany(CaracteristicasPCategoriadetalle::class, 'clave_componente');
	}

	public function caracteristicas_p_componentes()
	{
		return $this->hasMany(CaracteristicasPComponente::class, 'clave_componente');
	}

	public function carrito_tds()
	{
		return $this->hasMany(CarritoTd::class, 'clave_componente');
	}

	public function detalle_compras()
	{
		return $this->hasMany(DetalleCompra::class, 'clave_componente');
	}

	public function detalle_venta()
	{
		return $this->hasMany(DetalleVentum::class, 'clave_componente');
	}
}
