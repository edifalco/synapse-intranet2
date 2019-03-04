<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d1684a8194RelationshipsToClientNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_notes', function(Blueprint $table) {
            if (!Schema::hasColumn('client_notes', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273568_5c7d1680d81a7')->references('id')->on('client_projects')->onDelete('cascade');
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
        Schema::table('client_notes', function(Blueprint $table) {
            
        });
    }
}
