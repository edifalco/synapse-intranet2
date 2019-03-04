<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551710769ExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
