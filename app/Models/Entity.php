<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:25:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Entity
 * 
 * @property string $id
 * @property string $name
 * @property string $alias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $policies
 *
 * @package App\Models
 */
class Entity extends Eloquent
{
	protected $table = 'entity';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'alias'
	];

	public function policies()
	{
		return $this->hasMany(\App\Models\Policy::class, 'id_entity');
	}
}
