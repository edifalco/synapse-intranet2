<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7915ed60ec0RelationshipsToMeetingTable extends Migration
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
                $table->foreign('project_id', '272454_5c7913963e4bb')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meetings', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '272454_5c7913965af6b')->references('id')->on('statuses')->onDelete('cascade');
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
                $table->dropForeign('272454_5c7913963e4bb');
                $table->dropIndex('272454_5c7913963e4bb');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('meetings', 'status_id')) {
                $table->dropForeign('272454_5c7913965af6b');
                $table->dropIndex('272454_5c7913965af6b');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
