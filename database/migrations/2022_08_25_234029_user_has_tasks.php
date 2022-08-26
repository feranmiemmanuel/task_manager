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
        Schema::create('user_has_tasks', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('task_id');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_tasks');
    }
};
