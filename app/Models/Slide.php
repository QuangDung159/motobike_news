<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Dec 2018 13:49:14 +0000.
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
	protected $table = 'slide';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'path',
		'link'
	];
}
