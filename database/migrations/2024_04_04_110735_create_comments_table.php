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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('employee_id');
            $table->text('comment');
            $table->timestamps();

            $table->softDeletes();

            $table->index('task_id', 'task_id_idx');
            $table->foreign('task_id', 'task_id_fk')
                ->on('tasks')->references('id');


            $table->index('employee_id', 'employee_id_idx');
            $table->foreign('employee_id', 'employee_id_fk')
                ->on('employees')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
