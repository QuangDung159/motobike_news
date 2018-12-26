<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Dec 2018 14:22:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slide
 * 
 * @property string $id
 * @property string $name
 * @property string $path
 * @property string $link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Slide extends Eloquent
{
	public $incrementing = false;

	protected $fillable = [
		'name',
		'path',
		'link'
	];
}
