<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c792be3dfea35c792be3dd7e0MediumProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('medium_project');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('medium_project')) {
            Schema::create('medium_project', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('medium_id')->unsigned()->nullable();
            $table->foreign('medium_id', 'fk_p_272453_272456_projec_5c791396a5b65')->references('id')->on('media');
                $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id', 'fk_p_272456_272453_medium_5c791396a6a13')->references('id')->on('projects');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
