<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TaskUserAccess
 * 
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property int $created_by
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TaskUserNotify extends Eloquent
{
	protected $table = 'task_user_notify';

	protected $casts = [
		'task_id' => 'int',
		'user_id' => 'int',
		'created_by' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'task_id',
		'user_id',
		'created_by',
		'status'
	];

	
}
