<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c79488009053MediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('media');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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
}
