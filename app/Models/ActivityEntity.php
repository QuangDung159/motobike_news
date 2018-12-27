<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ActivityEntity
 * 
 * @property string $id_activity
 * @property string $id_entity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Activity $activity
 * @property \App\Models\Entity $entity
 *
 * @package App\Models
 */
class ActivityEntity extends Eloquent
{
	protected $table = 'activity_entity';
	public $incrementing = false;

	public function activity()
	{
		return $this->belongsTo(\App\Models\Activity::class, 'id_activity');
	}

	public function entity()
	{
		return $this->belongsTo(\App\Models\Entity::class, 'id_entity');
	}
}
