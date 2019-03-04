<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf3794e9cfRelationshipsToTimeEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('time_entries', function(Blueprint $table) {
            if (!Schema::hasColumn('time_entries', 'work_type_id')) {
                $table->integer('work_type_id')->unsigned()->nullable();
                $table->foreign('work_type_id', '273444_5c7cf32920ad1')->references('id')->on('time_work_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('time_entries', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273444_5c7cf3295526f')->references('id')->on('time_projects')->onDelete('cascade');
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
        Schema::table('time_entries', function(Blueprint $table) {
            if(Schema::hasColumn('time_entries', 'work_type_id')) {
                $table->dropForeign('273444_5c7cf32920ad1');
                $table->dropIndex('273444_5c7cf32920ad1');
                $table->dropColumn('work_type_id');
            }
            if(Schema::hasColumn('time_entries', 'project_id')) {
                $table->dropForeign('273444_5c7cf3295526f');
                $table->dropIndex('273444_5c7cf3295526f');
                $table->dropColumn('project_id');
            }
            
        });
    }
}
