<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('completion');
            $table->integer('project_id')->unsigned();//将当前的整数设置为正整数,不能为负数
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');//project_id是一个外键,它索引了projects表里面id这一栏,当删除一个projects表时,下面的数据同时删掉,层叠联动
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
