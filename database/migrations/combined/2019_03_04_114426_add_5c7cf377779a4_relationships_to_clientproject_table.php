<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf377779a4RelationshipsToClientProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_projects', function(Blueprint $table) {
            if (!Schema::hasColumn('client_projects', 'client_id')) {
                $table->integer('client_id')->unsigned()->nullable();
                $table->foreign('client_id', '273425_5c7cf239d84fd')->references('id')->on('clients')->onDelete('cascade');
                }
                if (!Schema::hasColumn('client_projects', 'project_status_id')) {
                $table->integer('project_status_id')->unsigned()->nullable();
                $table->foreign('project_status_id', '273425_5c7cf23a0a7de')->references('id')->on('client_project_statuses')->onDelete('cascade');
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
        Schema::table('client_projects', function(Blueprint $table) {
            if(Schema::hasColumn('client_projects', 'client_id')) {
                $table->dropForeign('273425_5c7cf239d84fd');
                $table->dropIndex('273425_5c7cf239d84fd');
                $table->dropColumn('client_id');
            }
            if(Schema::hasColumn('client_projects', 'project_status_id')) {
                $table->dropForeign('273425_5c7cf23a0a7de');
                $table->dropIndex('273425_5c7cf23a0a7de');
                $table->dropColumn('project_status_id');
            }
            
        });
    }
}
