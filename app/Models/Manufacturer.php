<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Dec 2018 13:25:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Manufacturer
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
class Manufacturer extends Eloquent
{
    protected $table = 'manufacturer';
    public $incrementing = false;

    protected $fillable = [
        'name'
    ];

    public function motorbikes()
    {
        return $this->hasMany(\App\Models\Motorbike::class, 'id_manufacturer');
    }
}
