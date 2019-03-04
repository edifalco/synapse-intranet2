<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf37595f42RelationshipsToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            if (!Schema::hasColumn('projects', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '273397_5c7ce7156e260')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::table('projects', function(Blueprint $table) {
            if(Schema::hasColumn('projects', 'status_id')) {
                $table->dropForeign('273397_5c7ce7156e260');
                $table->dropIndex('273397_5c7ce7156e260');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
