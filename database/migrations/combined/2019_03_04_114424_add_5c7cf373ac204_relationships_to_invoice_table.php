<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf373ac204RelationshipsToInvoiceTable extends Migration
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
                $table->foreign('user_id', '273394_5c7ce7358fd1b')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273394_5c7ce735a83cc')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->integer('expense_type_id')->unsigned()->nullable();
                $table->foreign('expense_type_id', '273394_5c7ce735c2a2d')->references('id')->on('expense_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'meeting_id')) {
                $table->integer('meeting_id')->unsigned()->nullable();
                $table->foreign('meeting_id', '273394_5c7ce735db8ad')->references('id')->on('meetings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'contingency_id')) {
                $table->integer('contingency_id')->unsigned()->nullable();
                $table->foreign('contingency_id', '273394_5c7ce73601a43')->references('id')->on('contingencies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'provider_id')) {
                $table->integer('provider_id')->unsigned()->nullable();
                $table->foreign('provider_id', '273394_5c7ce73624c80')->references('id')->on('providers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'service_type_id')) {
                $table->integer('service_type_id')->unsigned()->nullable();
                $table->foreign('service_type_id', '273394_5c7ce7365c97d')->references('id')->on('service_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '273394_5c7ce736802ed')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'finance_id')) {
                $table->integer('finance_id')->unsigned()->nullable();
                $table->foreign('finance_id', '273394_5c7ce736a1b56')->references('id')->on('users')->onDelete('cascade');
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
                $table->dropForeign('273394_5c7ce7358fd1b');
                $table->dropIndex('273394_5c7ce7358fd1b');
                $table->dropColumn('user_id');
            }
            if(Schema::hasColumn('invoices', 'project_id')) {
                $table->dropForeign('273394_5c7ce735a83cc');
                $table->dropIndex('273394_5c7ce735a83cc');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->dropForeign('273394_5c7ce735c2a2d');
                $table->dropIndex('273394_5c7ce735c2a2d');
                $table->dropColumn('expense_type_id');
            }
            if(Schema::hasColumn('invoices', 'meeting_id')) {
                $table->dropForeign('273394_5c7ce735db8ad');
                $table->dropIndex('273394_5c7ce735db8ad');
                $table->dropColumn('meeting_id');
            }
            if(Schema::hasColumn('invoices', 'contingency_id')) {
                $table->dropForeign('273394_5c7ce73601a43');
                $table->dropIndex('273394_5c7ce73601a43');
                $table->dropColumn('contingency_id');
            }
            if(Schema::hasColumn('invoices', 'provider_id')) {
                $table->dropForeign('273394_5c7ce73624c80');
                $table->dropIndex('273394_5c7ce73624c80');
                $table->dropColumn('provider_id');
            }
            if(Schema::hasColumn('invoices', 'service_type_id')) {
                $table->dropForeign('273394_5c7ce7365c97d');
                $table->dropIndex('273394_5c7ce7365c97d');
                $table->dropColumn('service_type_id');
            }
            if(Schema::hasColumn('invoices', 'pm_id')) {
                $table->dropForeign('273394_5c7ce736802ed');
                $table->dropIndex('273394_5c7ce736802ed');
                $table->dropColumn('pm_id');
            }
            if(Schema::hasColumn('invoices', 'finance_id')) {
                $table->dropForeign('273394_5c7ce736a1b56');
                $table->dropIndex('273394_5c7ce736a1b56');
                $table->dropColumn('finance_id');
            }
            
        });
    }
}
