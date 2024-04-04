<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use  SoftDeletes;

    protected $table = 'employees';
    protected $guarded = false;

    public function Tasks()
    {
        return $this->belongsToMany(Task::class,
            'employee_tasks',
            'employee_id',
            'task_id');
    }
}
