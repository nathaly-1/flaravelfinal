<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $idRol
 * @property string $rol
 * @property string|null $descripcion
 * 
 * @property Collection|Empleado[] $empleados
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'idRol';
	public $timestamps = false;

	protected $fillable = [
		'rol',
		'descripcion'
	];

	public function empleados()
	{
		return $this->hasMany(Empleado::class, 'id_rol');
	}
}
