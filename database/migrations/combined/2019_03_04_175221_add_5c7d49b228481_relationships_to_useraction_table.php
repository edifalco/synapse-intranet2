<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d49b228481RelationshipsToUserActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_actions', function(Blueprint $table) {
            if (!Schema::hasColumn('user_actions', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '273544_5c7d15fd3a22c')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('user_actions', function(Blueprint $table) {
            if(Schema::hasColumn('user_actions', 'user_id')) {
                $table->dropForeign('273544_5c7d15fd3a22c');
                $table->dropIndex('273544_5c7d15fd3a22c');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
