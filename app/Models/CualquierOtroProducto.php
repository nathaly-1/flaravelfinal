<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CualquierOtroProducto
 * 
 * @property string $clave_c_producto
 *
 * @package App\Models
 */
class CualquierOtroProducto extends Model
{
	protected $table = 'cualquier_otro_producto';
	protected $primaryKey = 'clave_c_producto';
	public $incrementing = false;
	public $timestamps = false;
}
