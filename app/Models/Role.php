<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:25:25 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $policies
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

	public function policies()
	{
		return $this->hasMany(\App\Models\Policy::class, 'id_role');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'id_role');
	}
}
