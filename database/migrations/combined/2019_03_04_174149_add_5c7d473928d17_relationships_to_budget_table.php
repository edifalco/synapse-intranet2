<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d473928d17RelationshipsToBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function(Blueprint $table) {
            if (!Schema::hasColumn('budgets', 'projects_id')) {
                $table->integer('projects_id')->unsigned()->nullable();
                $table->foreign('projects_id', '273595_5c7d17b1484ac')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '273595_5c7d17b16f735')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'year_id')) {
                $table->integer('year_id')->unsigned()->nullable();
                $table->foreign('year_id', '273595_5c7d17b19596e')->references('id')->on('years')->onDelete('cascade');
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
        Schema::table('budgets', function(Blueprint $table) {
            if(Schema::hasColumn('budgets', 'projects_id')) {
                $table->dropForeign('273595_5c7d17b1484ac');
                $table->dropIndex('273595_5c7d17b1484ac');
                $table->dropColumn('projects_id');
            }
            if(Schema::hasColumn('budgets', 'category_id')) {
                $table->dropForeign('273595_5c7d17b16f735');
                $table->dropIndex('273595_5c7d17b16f735');
                $table->dropColumn('category_id');
            }
            if(Schema::hasColumn('budgets', 'year_id')) {
                $table->dropForeign('273595_5c7d17b19596e');
                $table->dropIndex('273595_5c7d17b19596e');
                $table->dropColumn('year_id');
            }
            
        });
    }
}
