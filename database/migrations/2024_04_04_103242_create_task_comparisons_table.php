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
        Schema::create('task_comparisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_task1');
            $table->unsignedBigInteger('id_task2');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->index('id_task1', 'id_task1_idx');
            $table->foreign('id_task1', 'id_task1_fk')
                ->on('tasks')->references('id');

            $table->index('id_task2', 'id_task2_idx');
            $table->foreign('id_task2', 'id_task2_fk')
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
        Schema::dropIfExists('task_comparisons');
    }
};
