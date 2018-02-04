<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Auth;

/**
 * Class TaskAttachment
 * 
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $task_id
 * @property int $created_by
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TaskAttachment extends Eloquent
{
	protected $casts = [
		'task_id' => 'int',
		'created_by' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'file',
		'task_id',
		'created_by',
		'status'
	];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $model->created_by = Auth::user()->id;
            //$model->updated_by = Auth::user()->id;
        });

        static::updating(function($model)
        {
            //$model->updated_by = Auth::user()->id;
        });
    }

}
