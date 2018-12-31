<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:25:25 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $policies
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

	public function policies()
	{
		return $this->hasMany(\App\Models\Policy::class, 'id_activity');
	}
}
