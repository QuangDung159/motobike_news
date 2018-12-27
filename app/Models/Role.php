<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $role_activities
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = 'role';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function role_activities()
	{
		return $this->hasMany(\App\Models\RoleActivity::class, 'id_role');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'id_role');
	}
}
