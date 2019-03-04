<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7cf378549feRelationshipsToCrmDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_documents', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_documents', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '273431_5c7cf25e67d95')->references('id')->on('crm_customers')->onDelete('cascade');
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
        Schema::table('crm_documents', function(Blueprint $table) {
            if(Schema::hasColumn('crm_documents', 'customer_id')) {
                $table->dropForeign('273431_5c7cf25e67d95');
                $table->dropIndex('273431_5c7cf25e67d95');
                $table->dropColumn('customer_id');
            }
            
        });
    }
}
