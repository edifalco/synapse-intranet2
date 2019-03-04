<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d3a7fa5a7bInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invoices');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->increments('id');
                $table->date('date')->nullable();
                $table->date('due_date')->nullable();
                $table->decimal('invoice_subtotal', 15, 2)->nullable();
                $table->decimal('invoice_taxes', 15, 2)->nullable();
                $table->decimal('invoice_total', 15, 2)->nullable();
                $table->decimal('budget_subtotal', 15, 2)->nullable();
                $table->decimal('budget_taxes', 15, 2)->nullable();
                $table->decimal('budget_total', 15, 2)->nullable();
                $table->string('service')->nullable();
                $table->string('selection_criteria')->nullable();
                $table->time('pm_approval_date')->nullable();
                $table->time('finance_approval_date')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
