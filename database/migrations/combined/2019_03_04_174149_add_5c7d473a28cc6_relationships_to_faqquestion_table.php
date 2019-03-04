<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d473a28cc6RelationshipsToFaqQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faq_questions', function(Blueprint $table) {
            if (!Schema::hasColumn('faq_questions', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '273579_5c7d16de6002b')->references('id')->on('faq_categories')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_questions', function(Blueprint $table) {
            if(Schema::hasColumn('faq_questions', 'category_id')) {
                $table->dropForeign('273579_5c7d16de6002b');
                $table->dropIndex('273579_5c7d16de6002b');
                $table->dropColumn('category_id');
            }
            
        });
    }
}
