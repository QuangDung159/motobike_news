<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Entity
 * 
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $activities
 *
 * @package App\Models
 */
class Entity extends Eloquent
{
	protected $table = 'entity';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function activities()
	{
		return $this->belongsToMany(\App\Models\Activity::class, 'activity_entity', 'id_entity', 'id_activity')
					->withTimestamps();
	}
}
