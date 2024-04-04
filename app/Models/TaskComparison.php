<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskComparison extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='task_comparisons';
    protected $guarded=false;
}
