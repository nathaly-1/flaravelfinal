<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarritoTd
 * 
 * @property int $id_carrito
 * @property int $id_usuario
 * @property string $clave_componente
 * @property int $cantidad
 * 
 * @property Componente $componente
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class CarritoTd extends Model
{
	protected $table = 'carrito_td';
	protected $primaryKey = 'id_carrito';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'clave_componente',
		'cantidad'
	];

	public function componente()
	{
		return $this->belongsTo(Componente::class, 'clave_componente');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
