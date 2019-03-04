<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf0da5f1c3RelationshipsToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function(Blueprint $table) {
            if (!Schema::hasColumn('clients', 'client_status_id')) {
                $table->integer('client_status_id')->unsigned()->nullable();
                $table->foreign('client_status_id', '273424_5c7cf0d7071bc')->references('id')->on('client_statuses')->onDelete('cascade');
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
        Schema::table('clients', function(Blueprint $table) {
            
        });
    }
}
