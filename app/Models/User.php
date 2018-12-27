<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property string $id
 * @property string $id_role
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon $dob
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $incrementing = false;

	protected $dates = [
		'dob'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'id_role',
		'name',
		'email',
		'password',
		'dob'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'id_role');
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class, 'id_user');
	}
}
