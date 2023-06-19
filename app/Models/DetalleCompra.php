<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 * 
 * @property int $id_detalle_compra
 * @property string $folio_compra
 * @property string $clave_componente
 * @property float $cantidad_componente
 * @property float $precio
 * 
 * @property Compra $compra
 * @property Componente $componente
 *
 * @package App\Models
 */
class DetalleCompra extends Model
{
	protected $table = 'detalle_compra';
	protected $primaryKey = 'id_detalle_compra';
	public $timestamps = false;

	protected $casts = [
		'cantidad_componente' => 'float',
		'precio' => 'float'
	];

	protected $fillable = [
		'folio_compra',
		'clave_componente',
		'cantidad_componente',
		'precio'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class, 'folio_compra');
	}

	public function componente()
	{
		return $this->belongsTo(Componente::class, 'clave_componente');
	}
}
