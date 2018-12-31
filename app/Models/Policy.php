<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:25:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Policy
 * 
 * @property string $id_role
 * @property string $id_activity
 * @property string $id_entity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Activity $activity
 * @property \App\Models\Entity $entity
 * @property \App\Models\Role $role
 *
 * @package App\Models
 */
class Policy extends Eloquent
{
	protected $table = 'policy';
	public $incrementing = false;

	public function activity()
	{
		return $this->belongsTo(\App\Models\Activity::class, 'id_activity');
	}

	public function entity()
	{
		return $this->belongsTo(\App\Models\Entity::class, 'id_entity');
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'id_role');
	}
}
