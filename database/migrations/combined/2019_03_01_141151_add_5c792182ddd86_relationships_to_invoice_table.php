<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c792182ddd86RelationshipsToInvoiceTable extends Migration
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
                $table->foreign('user_id', '272452_5c7913954a145')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '272452_5c79139567a2f')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'contingency_id')) {
                $table->integer('contingency_id')->unsigned()->nullable();
                $table->foreign('contingency_id', '272452_5c791394c8562')->references('id')->on('contingencies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->integer('expense_type_id')->unsigned()->nullable();
                $table->foreign('expense_type_id', '272452_5c791394a14cf')->references('id')->on('expense_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'meeting_id')) {
                $table->integer('meeting_id')->unsigned()->nullable();
                $table->foreign('meeting_id', '272452_5c791394b4cc8')->references('id')->on('meetings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'provider_id')) {
                $table->integer('provider_id')->unsigned()->nullable();
                $table->foreign('provider_id', '272452_5c791394e260f')->references('id')->on('providers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'service_type_id')) {
                $table->integer('service_type_id')->unsigned()->nullable();
                $table->foreign('service_type_id', '272452_5c79139502620')->references('id')->on('service_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '272452_5c7913951a16e')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'finance_id')) {
                $table->integer('finance_id')->unsigned()->nullable();
                $table->foreign('finance_id', '272452_5c791395345fe')->references('id')->on('users')->onDelete('cascade');
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
            if(Schema::hasColumn('invoices', 'user_id')) {
                $table->dropForeign('272452_5c7913954a145');
                $table->dropIndex('272452_5c7913954a145');
                $table->dropColumn('user_id');
            }
            if(Schema::hasColumn('invoices', 'project_id')) {
                $table->dropForeign('272452_5c79139567a2f');
                $table->dropIndex('272452_5c79139567a2f');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('invoices', 'contingency_id')) {
                $table->dropForeign('272452_5c791394c8562');
                $table->dropIndex('272452_5c791394c8562');
                $table->dropColumn('contingency_id');
            }
            if(Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->dropForeign('272452_5c791394a14cf');
                $table->dropIndex('272452_5c791394a14cf');
                $table->dropColumn('expense_type_id');
            }
            if(Schema::hasColumn('invoices', 'meeting_id')) {
                $table->dropForeign('272452_5c791394b4cc8');
                $table->dropIndex('272452_5c791394b4cc8');
                $table->dropColumn('meeting_id');
            }
            if(Schema::hasColumn('invoices', 'provider_id')) {
                $table->dropForeign('272452_5c791394e260f');
                $table->dropIndex('272452_5c791394e260f');
                $table->dropColumn('provider_id');
            }
            if(Schema::hasColumn('invoices', 'service_type_id')) {
                $table->dropForeign('272452_5c79139502620');
                $table->dropIndex('272452_5c79139502620');
                $table->dropColumn('service_type_id');
            }
            if(Schema::hasColumn('invoices', 'pm_id')) {
                $table->dropForeign('272452_5c7913951a16e');
                $table->dropIndex('272452_5c7913951a16e');
                $table->dropColumn('pm_id');
            }
            if(Schema::hasColumn('invoices', 'finance_id')) {
                $table->dropForeign('272452_5c791395345fe');
                $table->dropIndex('272452_5c791395345fe');
                $table->dropColumn('finance_id');
            }
            
        });
    }
}
