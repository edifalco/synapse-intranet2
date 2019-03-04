<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d169f16eecRelationshipsToClientTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_transactions', function(Blueprint $table) {
            if (!Schema::hasColumn('client_transactions', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273570_5c7d169b2b4d5')->references('id')->on('client_projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('client_transactions', 'transaction_type_id')) {
                $table->integer('transaction_type_id')->unsigned()->nullable();
                $table->foreign('transaction_type_id', '273570_5c7d169b56098')->references('id')->on('client_transaction_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('client_transactions', 'income_source_id')) {
                $table->integer('income_source_id')->unsigned()->nullable();
                $table->foreign('income_source_id', '273570_5c7d169b7dee4')->references('id')->on('client_income_sources')->onDelete('cascade');
                }
                if (!Schema::hasColumn('client_transactions', 'currency_id')) {
                $table->integer('currency_id')->unsigned()->nullable();
                $table->foreign('currency_id', '273570_5c7d169ba8f85')->references('id')->on('client_currencies')->onDelete('cascade');
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
        Schema::table('client_transactions', function(Blueprint $table) {
            
        });
    }
}
