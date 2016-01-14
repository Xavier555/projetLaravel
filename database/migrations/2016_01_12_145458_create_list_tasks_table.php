<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->index();
            $table->string('name');
            $table->boolean('validation')->default(false);
            $table->date('echeance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listasks');
    }
}
