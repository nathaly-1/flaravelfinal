<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CaracteristicasPCategorium
 * 
 * @property int $id_caracteristica
 * @property int $id_categoria
 * @property string $nombre_caracteristica
 * 
 * @property Categorium $categorium
 * @property Collection|CaracteristicasPCategoriadetalle[] $caracteristicas_p_categoriadetalles
 *
 * @package App\Models
 */
class CaracteristicasPCategorium extends Model
{
	protected $table = 'caracteristicas_p_categoria';
	protected $primaryKey = 'id_caracteristica';
	public $timestamps = false;

	protected $casts = [
		'id_categoria' => 'int'
	];

	protected $fillable = [
		'id_categoria',
		'nombre_caracteristica'
	];

	public function categorium()
	{
		return $this->belongsTo(Categorium::class, 'id_categoria');
	}

	public function caracteristicas_p_categoriadetalles()
	{
		return $this->hasMany(CaracteristicasPCategoriadetalle::class, 'id_caracteristica');
	}
}
