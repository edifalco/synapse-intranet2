<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7d49abf1d73RelationshipsToExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function(Blueprint $table) {
            if (!Schema::hasColumn('expenses', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '273639_5c7d3a384c47a')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '273639_5c7d3a389150a')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'expense_type_id')) {
                $table->integer('expense_type_id')->unsigned()->nullable();
                $table->foreign('expense_type_id', '273639_5c7d3a38c18c2')->references('id')->on('expense_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'meeting_id')) {
                $table->integer('meeting_id')->unsigned()->nullable();
                $table->foreign('meeting_id', '273639_5c7d3a3908bc5')->references('id')->on('meetings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'contingency_id')) {
                $table->integer('contingency_id')->unsigned()->nullable();
                $table->foreign('contingency_id', '273639_5c7d3a394696e')->references('id')->on('contingencies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'provider_id')) {
                $table->integer('provider_id')->unsigned()->nullable();
                $table->foreign('provider_id', '273639_5c7d3a39870ec')->references('id')->on('providers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'service_type_id')) {
                $table->integer('service_type_id')->unsigned()->nullable();
                $table->foreign('service_type_id', '273639_5c7d3a39c1c9c')->references('id')->on('service_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '273639_5c7d3a3a19ab4')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'finance_id')) {
                $table->integer('finance_id')->unsigned()->nullable();
                $table->foreign('finance_id', '273639_5c7d3a3a71053')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('expenses', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '273639_5c7d42cc561da')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('expenses', function(Blueprint $table) {
            if(Schema::hasColumn('expenses', 'user_id')) {
                $table->dropForeign('273639_5c7d3a384c47a');
                $table->dropIndex('273639_5c7d3a384c47a');
                $table->dropColumn('user_id');
            }
            if(Schema::hasColumn('expenses', 'project_id')) {
                $table->dropForeign('273639_5c7d3a389150a');
                $table->dropIndex('273639_5c7d3a389150a');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('expenses', 'expense_type_id')) {
                $table->dropForeign('273639_5c7d3a38c18c2');
                $table->dropIndex('273639_5c7d3a38c18c2');
                $table->dropColumn('expense_type_id');
            }
            if(Schema::hasColumn('expenses', 'meeting_id')) {
                $table->dropForeign('273639_5c7d3a3908bc5');
                $table->dropIndex('273639_5c7d3a3908bc5');
                $table->dropColumn('meeting_id');
            }
            if(Schema::hasColumn('expenses', 'contingency_id')) {
                $table->dropForeign('273639_5c7d3a394696e');
                $table->dropIndex('273639_5c7d3a394696e');
                $table->dropColumn('contingency_id');
            }
            if(Schema::hasColumn('expenses', 'provider_id')) {
                $table->dropForeign('273639_5c7d3a39870ec');
                $table->dropIndex('273639_5c7d3a39870ec');
                $table->dropColumn('provider_id');
            }
            if(Schema::hasColumn('expenses', 'service_type_id')) {
                $table->dropForeign('273639_5c7d3a39c1c9c');
                $table->dropIndex('273639_5c7d3a39c1c9c');
                $table->dropColumn('service_type_id');
            }
            if(Schema::hasColumn('expenses', 'pm_id')) {
                $table->dropForeign('273639_5c7d3a3a19ab4');
                $table->dropIndex('273639_5c7d3a3a19ab4');
                $table->dropColumn('pm_id');
            }
            if(Schema::hasColumn('expenses', 'finance_id')) {
                $table->dropForeign('273639_5c7d3a3a71053');
                $table->dropIndex('273639_5c7d3a3a71053');
                $table->dropColumn('finance_id');
            }
            if(Schema::hasColumn('expenses', 'created_by_id')) {
                $table->dropForeign('273639_5c7d42cc561da');
                $table->dropIndex('273639_5c7d42cc561da');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
