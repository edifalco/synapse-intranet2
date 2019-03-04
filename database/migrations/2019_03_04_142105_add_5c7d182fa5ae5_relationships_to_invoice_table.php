<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d182fa5ae5RelationshipsToInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function(Blueprint $table) {
            if (!Schema::hasColumn('invoices', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '273591_5c7d179e43f78')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273591_5c7d179e64118')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->integer('expense_type_id')->unsigned()->nullable();
                $table->foreign('expense_type_id', '273591_5c7d179e82335')->references('id')->on('expense_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'meeting_id')) {
                $table->integer('meeting_id')->unsigned()->nullable();
                $table->foreign('meeting_id', '273591_5c7d179ea4f8e')->references('id')->on('meetings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'contingency_id')) {
                $table->integer('contingency_id')->unsigned()->nullable();
                $table->foreign('contingency_id', '273591_5c7d179ec7301')->references('id')->on('contingencies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'provider_id')) {
                $table->integer('provider_id')->unsigned()->nullable();
                $table->foreign('provider_id', '273591_5c7d179eecaba')->references('id')->on('providers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'service_type_id')) {
                $table->integer('service_type_id')->unsigned()->nullable();
                $table->foreign('service_type_id', '273591_5c7d179f198bb')->references('id')->on('service_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '273591_5c7d179f37526')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'finance_id')) {
                $table->integer('finance_id')->unsigned()->nullable();
                $table->foreign('finance_id', '273591_5c7d179f5dfd0')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('invoices', function(Blueprint $table) {
            
        });
    }
}
