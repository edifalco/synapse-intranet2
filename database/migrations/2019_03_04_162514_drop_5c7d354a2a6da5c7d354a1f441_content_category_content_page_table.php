<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d354a2a6da5c7d354a1f441ContentCategoryContentPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('content_category_content_page');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('content_category_content_page')) {
            Schema::create('content_category_content_page', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('content_category_id')->unsigned()->nullable();
            $table->foreign('content_category_id', 'fk_p_273581_273583_conten_5c7d17060229f')->references('id')->on('content_categories');
                $table->integer('content_page_id')->unsigned()->nullable();
            $table->foreign('content_page_id', 'fk_p_273583_273581_conten_5c7d170603674')->references('id')->on('content_pages');
                
                $table->timestamps();
                
            });
        }
    }
}
