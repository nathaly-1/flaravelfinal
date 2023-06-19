<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $idUsusrio
 * @property string $usuario
 * @property string $pasword1
 * @property int $n_empleado
 * 
 * @property Empleado $empleado
 * @property Collection|CarritoTd[] $carrito_tds
 * @property Collection|Ventum[] $venta
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'idUsusrio';
	public $timestamps = false;

	protected $casts = [
		'n_empleado' => 'int'
	];

	protected $fillable = [
		'usuario',
		'pasword1',
		'n_empleado'
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'n_empleado');
	}

	public function carrito_tds()
	{
		return $this->hasMany(CarritoTd::class, 'id_usuario');
	}

	public function venta()
	{
		return $this->hasMany(Ventum::class, 'id_usuario');
	}
}
