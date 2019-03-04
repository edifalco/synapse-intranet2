<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d35b8e17ab5c7d35b8dda1eTaskTaskTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('task_task_tag');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('task_task_tag')) {
            Schema::create('task_task_tag', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('task_id')->unsigned()->nullable();
            $table->foreign('task_id', 'fk_p_273575_273574_taskta_5c7d16c2d0e38')->references('id')->on('tasks');
                $table->integer('task_tag_id')->unsigned()->nullable();
            $table->foreign('task_tag_id', 'fk_p_273574_273575_task_t_5c7d16c2cf970')->references('id')->on('task_tags');
                
                $table->timestamps();
                
            });
        }
    }
}
