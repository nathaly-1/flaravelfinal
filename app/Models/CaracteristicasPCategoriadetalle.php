<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CaracteristicasPCategoriadetalle
 * 
 * @property int $id_caracteristicasdetalle_producto
 * @property string $clave_componente
 * @property int $id_caracteristica
 * @property string $descripcion_caracteristica
 * 
 * @property CaracteristicasPCategorium $caracteristicas_p_categorium
 * @property Componente $componente
 *
 * @package App\Models
 */
class CaracteristicasPCategoriadetalle extends Model
{
	protected $table = 'caracteristicas_p_categoriadetalle';
	protected $primaryKey = 'id_caracteristicasdetalle_producto';
	public $timestamps = false;

	protected $casts = [
		'id_caracteristica' => 'int'
	];

	protected $fillable = [
		'clave_componente',
		'id_caracteristica',
		'descripcion_caracteristica'
	];

	public function caracteristicas_p_categorium()
	{
		return $this->belongsTo(CaracteristicasPCategorium::class, 'id_caracteristica');
	}

	public function componente()
	{
		return $this->belongsTo(Componente::class, 'clave_componente');
	}
}
