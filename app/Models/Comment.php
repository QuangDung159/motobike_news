<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Dec 2018 14:22:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property string $id
 * @property string $id_user
 * @property string $id_motorbike
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Motorbike $motorbike
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	public $incrementing = false;

	protected $fillable = [
		'id_user',
		'id_motorbike',
		'content'
	];

	public function motorbike()
	{
		return $this->belongsTo(\App\Models\Motorbike::class, 'id_motorbike');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_user');
	}
}
