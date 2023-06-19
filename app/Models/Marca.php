<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $id_marca
 * @property string $nombre_marca
 * @property int $status
 * 
 * @property Collection|Componente[] $componentes
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marca';
	protected $primaryKey = 'id_marca';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'nombre_marca',
		'status'
	];

	public function componentes()
	{
		return $this->hasMany(Componente::class, 'id_ct_marca');
	}
}
