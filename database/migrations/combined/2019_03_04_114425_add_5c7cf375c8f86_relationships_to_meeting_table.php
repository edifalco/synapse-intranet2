<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf375c8f86RelationshipsToMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetings', function(Blueprint $table) {
            if (!Schema::hasColumn('meetings', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273396_5c7ce71c478f0')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meetings', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '273396_5c7ce71c64a91')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::table('meetings', function(Blueprint $table) {
            if(Schema::hasColumn('meetings', 'project_id')) {
                $table->dropForeign('273396_5c7ce71c478f0');
                $table->dropIndex('273396_5c7ce71c478f0');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('meetings', 'status_id')) {
                $table->dropForeign('273396_5c7ce71c64a91');
                $table->dropIndex('273396_5c7ce71c64a91');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
