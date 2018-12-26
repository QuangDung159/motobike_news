<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Dec 2018 14:22:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleActivity
 * 
 * @property string $id_role
 * @property string $id_activity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Activity $activity
 * @property \App\Models\Role $role
 *
 * @package App\Models
 */
class RoleActivity extends Eloquent
{
	public $incrementing = false;

	public function activity()
	{
		return $this->belongsTo(\App\Models\Activity::class, 'id_activity');
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'id_role');
	}
}
