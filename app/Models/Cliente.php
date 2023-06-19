<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id_cliente
 * @property string $nombre_cliente
 * @property string $razon_social_cliente
 * @property string $direccion_cliente
 * @property string $telefono_cliente
 * @property string $correo_cliente
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'id_cliente';
	public $timestamps = false;

	protected $fillable = [
		'nombre_cliente',
		'razon_social_cliente',
		'direccion_cliente',
		'telefono_cliente',
		'correo_cliente'
	];
}
