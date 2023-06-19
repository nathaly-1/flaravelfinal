<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 * 
 * @property int $id_categoria
 * @property string $nombre_categoria
 * @property string $descripcion_categoria
 * @property bool $status_categoria
 * 
 * @property Collection|CaracteristicasPCategorium[] $caracteristicas_p_categoria
 * @property Collection|Componente[] $componentes
 *
 * @package App\Models
 */
class Categorium extends Model
{
	protected $table = 'categoria';
	protected $primaryKey = 'id_categoria';
	public $timestamps = false;

	protected $casts = [
		'status_categoria' => 'bool'
	];

	protected $fillable = [
		'nombre_categoria',
		'descripcion_categoria',
		'status_categoria'
	];

	public function caracteristicas_p_categoria()
	{
		return $this->hasMany(CaracteristicasPCategorium::class, 'id_categoria');
	}

	public function componentes()
	{
		return $this->hasMany(Componente::class, 'id_categoria');
	}
}
