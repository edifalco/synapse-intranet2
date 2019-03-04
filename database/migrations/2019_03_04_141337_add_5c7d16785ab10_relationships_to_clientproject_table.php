<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d16785ab10RelationshipsToClientProjectTable extends Migration
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
                $table->foreign('client_id', '273567_5c7d1673c29f7')->references('id')->on('clients')->onDelete('cascade');
                }
                if (!Schema::hasColumn('client_projects', 'project_status_id')) {
                $table->integer('project_status_id')->unsigned()->nullable();
                $table->foreign('project_status_id', '273567_5c7d1673f2bea')->references('id')->on('client_project_statuses')->onDelete('cascade');
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
            
        });
    }
}
