<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:20:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleActivity
 * 
 * @property string $id_role
 * @property string $id_activity
 * @property string $id_activity_entity
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
	protected $table = 'role_activity';
	public $incrementing = false;

	protected $fillable = [
		'id_activity_entity'
	];

	public function activity()
	{
		return $this->belongsTo(\App\Models\Activity::class, 'id_activity');
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'id_role');
	}
}
