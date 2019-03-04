<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d1742db2c2RelationshipsToCrmCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_customers', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_customers', 'crm_status_id')) {
                $table->integer('crm_status_id')->unsigned()->nullable();
                $table->foreign('crm_status_id', '273587_5c7d173e76668')->references('id')->on('crm_statuses')->onDelete('cascade');
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
        Schema::table('crm_customers', function(Blueprint $table) {
            
        });
    }
}
