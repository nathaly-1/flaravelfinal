<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CaracteristicasPComponente
 * 
 * @property int $id_caracteristicas2_producto
 * @property string $clave_componente
 * @property string $nombre_caracteristica
 * @property string $descripcion_caracteristica
 * 
 * @property Componente $componente
 *
 * @package App\Models
 */
class CaracteristicasPComponente extends Model
{
	protected $table = 'caracteristicas_p_componente';
	protected $primaryKey = 'id_caracteristicas2_producto';
	public $timestamps = false;

	protected $fillable = [
		'clave_componente',
		'nombre_caracteristica',
		'descripcion_caracteristica'
	];

	public function componente()
	{
		return $this->belongsTo(Componente::class, 'clave_componente');
	}
}
