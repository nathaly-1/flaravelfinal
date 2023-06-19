<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property string $folio_compra
 * @property Carbon $fecha_compra
 * @property float $total_compra
 * 
 * @property Collection|DetalleCompra[] $detalle_compras
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compra';
	protected $primaryKey = 'folio_compra';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fecha_compra' => 'date',
		'total_compra' => 'float'
	];

	protected $fillable = [
		'fecha_compra',
		'total_compra'
	];

	public function detalle_compras()
	{
		return $this->hasMany(DetalleCompra::class, 'folio_compra');
	}
}
