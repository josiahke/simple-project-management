<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class UserDepartment
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class UserDepartment extends Eloquent
{
    use Sluggable;

	protected $fillable = [
		'name',
		'slug',
		'description'
	];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
