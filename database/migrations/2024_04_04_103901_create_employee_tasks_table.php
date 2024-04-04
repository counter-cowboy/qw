<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('task_id');
            $table->string('status');
            $table->timestamps();

            $table->softDeletes();

            $table->index('employee_id','employee_tasks_employees_idx');
            $table->foreign('employee_id', 'employee_tasks_employees_fk')
                ->on('employees')->references('id');

            $table->index('task_id','employee_tasks_tasks_idx');
            $table->foreign('task_id', 'employee_tasks_tasks_fk')
                ->on('tasks')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_tasks');
    }
};
