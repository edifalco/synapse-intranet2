<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf378c7808RelationshipsToIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function(Blueprint $table) {
            if (!Schema::hasColumn('incomes', 'income_category_id')) {
                $table->integer('income_category_id')->unsigned()->nullable();
                $table->foreign('income_category_id', '273438_5c7cf2ed0d12b')->references('id')->on('income_categories')->onDelete('cascade');
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
        Schema::table('incomes', function(Blueprint $table) {
            if(Schema::hasColumn('incomes', 'income_category_id')) {
                $table->dropForeign('273438_5c7cf2ed0d12b');
                $table->dropIndex('273438_5c7cf2ed0d12b');
                $table->dropColumn('income_category_id');
            }
            
        });
    }
}
