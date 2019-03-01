<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551438748MediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('media')) {
            Schema::create('media', function (Blueprint $table) {
                $table->increments('id');
                $table->string('model_type')->nullable();
                $table->integer('model_id')->nullable();
                $table->string('collection_name');
                $table->string('name');
                $table->string('file_name');
                $table->string('disk');
                $table->string('mime_type')->nullable();
                $table->integer('size')->nullable();
                $table->string('manipulations');
                $table->string('custom_properties');
                $table->string('responsive_images');
                $table->integer('order_column')->nullable();
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
