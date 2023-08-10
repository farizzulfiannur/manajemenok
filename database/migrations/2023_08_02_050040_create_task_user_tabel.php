<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUserTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_users', function (Blueprint $table) {
            $table->id();
            // $table->string('role')->nullable;
            // $table->boolean('role_id');
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('task_id');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('tasks_id')->constrained();
            $table->integer('is_roles');
            $table->timestamps();


            // $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            // $table->foreign('task_id')->on('tasks')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_user');
    }
}
