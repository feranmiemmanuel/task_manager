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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->string('user_id')->references(['id'])->on('users')->onDelete('CASCADE');
            $table->string('task_id')->references(['id'])->on('tasks')->onDelete('CASCADE');
            // $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('cascade');
            // $table->foreign(['task_id'])->references(['id'])->on('tasks')->onDelete('cascade');
            //$table->foreign(['customer_id'])->references(['id'])->on('customers')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
};
