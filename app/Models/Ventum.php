<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 * 
 * @property string $folio_venta
 * @property Carbon $fecha_venta
 * @property int $id_usuario
 * @property float $total_venta
 * 
 * @property Usuario $usuario
 * @property Collection|DetalleVentum[] $detalle_venta
 *
 * @package App\Models
 */
class Ventum extends Model
{
	protected $table = 'venta';
	protected $primaryKey = 'folio_venta';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fecha_venta' => 'date',
		'id_usuario' => 'int',
		'total_venta' => 'float'
	];

	protected $fillable = [
		'fecha_venta',
		'id_usuario',
		'total_venta'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function detalle_venta()
	{
		return $this->hasMany(DetalleVentum::class, 'folio_venta');
	}
}
