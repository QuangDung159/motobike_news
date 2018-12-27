<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MotorbikeType
 * 
 * @property string $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $motorbikes
 *
 * @package App\Models
 */
class MotorbikeType extends Eloquent
{
	protected $table = 'motorbike_type';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function motorbikes()
	{
		return $this->hasMany(\App\Models\Motorbike::class, 'id_motorbike_type');
	}
}
