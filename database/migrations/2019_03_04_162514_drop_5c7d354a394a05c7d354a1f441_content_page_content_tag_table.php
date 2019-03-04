<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d354a394a05c7d354a1f441ContentPageContentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('content_page_content_tag');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('content_page_content_tag')) {
            Schema::create('content_page_content_tag', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('content_page_id')->unsigned()->nullable();
            $table->foreign('content_page_id', 'fk_p_273583_273582_conten_5c7d170a51b2f')->references('id')->on('content_pages');
                $table->integer('content_tag_id')->unsigned()->nullable();
            $table->foreign('content_tag_id', 'fk_p_273582_273583_conten_5c7d170a509e1')->references('id')->on('content_tags');
                
                $table->timestamps();
                
            });
        }
    }
}
