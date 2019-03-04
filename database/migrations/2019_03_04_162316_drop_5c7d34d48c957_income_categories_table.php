<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d34d48c957IncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('income_categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('income_categories')) {
            Schema::create('income_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                
                $table->timestamps();
                
            });
        }
    }
}
