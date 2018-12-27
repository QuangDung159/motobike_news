<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Activity
 * 
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $entities
 *
 * @package App\Models
 */
class Activity extends Eloquent
{
	protected $table = 'activity';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function entities()
	{
		return $this->belongsToMany(\App\Models\Entity::class, 'activity_entity', 'id_activity', 'id_entity')
					->withTimestamps();
	}
}
