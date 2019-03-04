<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d49afc20d8RelationshipsToMeetingTable extends Migration
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
                $table->foreign('project_id', '273594_5c7d1784d7406')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meetings', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '273594_5c7d1784f2a41')->references('id')->on('statuses')->onDelete('cascade');
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
                $table->dropForeign('273594_5c7d1784d7406');
                $table->dropIndex('273594_5c7d1784d7406');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('meetings', 'status_id')) {
                $table->dropForeign('273594_5c7d1784f2a41');
                $table->dropIndex('273594_5c7d1784f2a41');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
