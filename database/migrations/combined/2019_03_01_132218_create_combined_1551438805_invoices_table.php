<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1551438805InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->increments('id');
                $table->double('invoice_subtotal', 15, 2)->nullable();
                $table->double('invoice_taxes', 15, 2)->nullable();
                $table->double('invoice_total', 15, 2)->nullable();
                $table->double('budget_subtotal', 15, 2)->nullable();
                $table->double('budget_taxes', 15, 2)->nullable();
                $table->double('budget_total', 15, 2)->nullable();
                $table->date('date')->nullable();
                $table->date('due_date')->nullable();
                $table->time('pm_approval_date')->nullable();
                $table->time('finance_approval_date')->nullable();
                $table->string('service')->nullable();
                $table->string('selection_criteria')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
