<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Auth;


/**
 * Class Task
 * 
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $priority_id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $due_date
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Task extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'category_id' => 'int',
		'priority_id' => 'int'
	];

	protected $dates = [
		'due_date'
	];

	protected $fillable = [
		'user_id',
		'category_id',
		'priority_id',
		'name',
		'description',
		'due_date',
		'status','assigned_user','type'
	];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $model->user_id = Auth::user()->id;
            //$model->updated_by = Auth::user()->id;
        });

        static::updating(function($model)
        {
            //$model->updated_by = Auth::user()->id;
        });
    }

    public function category()
    {
        return $this->hasOne('App\Models\TaskCategory','id','category_id');
    }

    public function priority()
    {
        return $this->hasOne('App\Models\TaskPriority','id','priority_id');
    }


}
