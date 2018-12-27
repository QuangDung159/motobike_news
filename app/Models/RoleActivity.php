<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
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

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'id_role');
	}
}
