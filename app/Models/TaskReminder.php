<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 10:45:19 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TaskReminder
 * 
 * @property int $id
 * @property int $task_id
 * @property int $reminder_duration
 * @property int $reminder_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TaskReminder extends Eloquent
{
	protected $table = 'task_reminder';

	protected $casts = [
		'task_id' => 'int',
		'reminder_duration' => 'int',
		'reminder_type' => 'int'
	];

	protected $fillable = [
		'task_id',
		'reminder_duration',
		'reminder_type'
	];
}
