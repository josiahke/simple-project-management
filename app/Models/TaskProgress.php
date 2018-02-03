<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TaskProgress
 * 
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property int $description
 * @property int $comlpletion
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TaskProgress extends Eloquent
{
	protected $table = 'task_progress';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'task_id' => 'int',
		'user_id' => 'int',
		'description' => 'int',
		'comlpletion' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'id',
		'task_id',
		'user_id',
		'description',
		'comlpletion',
		'status'
	];
}
