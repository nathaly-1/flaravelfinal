<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentum
 * 
 * @property int $id_dv
 * @property string $folio_venta
 * @property string $clave_componente
 * @property int $cantidad_componente
 * @property float $precio_venta
 * 
 * @property Ventum $ventum
 * @property Componente $componente
 *
 * @package App\Models
 */
class DetalleVentum extends Model
{
	protected $table = 'detalle_venta';
	protected $primaryKey = 'id_dv';
	public $timestamps = false;

	protected $casts = [
		'cantidad_componente' => 'int',
		'precio_venta' => 'float'
	];

	protected $fillable = [
		'folio_venta',
		'clave_componente',
		'cantidad_componente',
		'precio_venta'
	];

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'folio_venta');
	}

	public function componente()
	{
		return $this->belongsTo(Componente::class, 'clave_componente');
	}
}
