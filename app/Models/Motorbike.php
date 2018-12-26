<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Dec 2018 14:22:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Motorbike
 * 
 * @property string $id
 * @property string $name
 * @property float $capacity
 * @property string $id_motorbike_type
 * @property string $id_manufacturer
 * @property string $description
 * @property string $thumbnail
 * @property string $unsigned_title
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\Manufacturer $manufacturer
 * @property \App\Models\MotorbikeType $motorbike_type
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class Motorbike extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'capacity' => 'float'
	];

	protected $fillable = [
		'name',
		'capacity',
		'id_motorbike_type',
		'id_manufacturer',
		'description',
		'thumbnail',
		'unsigned_title'
	];

	public function manufacturer()
	{
		return $this->belongsTo(\App\Models\Manufacturer::class, 'id_manufacturer');
	}

	public function motorbike_type()
	{
		return $this->belongsTo(\App\Models\MotorbikeType::class, 'id_motorbike_type');
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class, 'id_motorbike');
	}
}
