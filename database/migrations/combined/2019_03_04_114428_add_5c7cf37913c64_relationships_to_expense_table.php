<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf37913c64RelationshipsToExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function(Blueprint $table) {
            if (!Schema::hasColumn('expenses', 'expense_category_id')) {
                $table->integer('expense_category_id')->unsigned()->nullable();
                $table->foreign('expense_category_id', '273439_5c7cf2fd37464')->references('id')->on('expense_categories')->onDelete('cascade');
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
        Schema::table('expenses', function(Blueprint $table) {
            if(Schema::hasColumn('expenses', 'expense_category_id')) {
                $table->dropForeign('273439_5c7cf2fd37464');
                $table->dropIndex('273439_5c7cf2fd37464');
                $table->dropColumn('expense_category_id');
            }
            
        });
    }
}
