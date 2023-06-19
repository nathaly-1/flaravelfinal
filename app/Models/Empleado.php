<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $n_empleado
 * @property string $nombre
 * @property string $apelldio_m
 * @property string $apellido_p
 * @property string $direccion
 * @property string $coreo
 * @property int $telefono
 * @property int $id_rol
 * 
 * @property Rol $rol
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	protected $primaryKey = 'n_empleado';
	public $timestamps = false;

	protected $casts = [
		'telefono' => 'int',
		'id_rol' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apelldio_m',
		'apellido_p',
		'direccion',
		'coreo',
		'telefono',
		'id_rol'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'n_empleado');
	}
}
