<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551453072InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if(Schema::hasColumn('invoices', 'budget_subtotal')) {
                $table->dropColumn('budget_subtotal');
            }
            if(Schema::hasColumn('invoices', 'budget_taxes')) {
                $table->dropColumn('budget_taxes');
            }
            if(Schema::hasColumn('invoices', 'budget_total')) {
                $table->dropColumn('budget_total');
            }
            if(Schema::hasColumn('invoices', 'money')) {
                $table->dropColumn('money');
            }
            if(Schema::hasColumn('invoices', 'invoice_total')) {
                $table->dropColumn('invoice_total');
            }
            
        });
Schema::table('invoices', function (Blueprint $table) {
            
if (!Schema::hasColumn('invoices', 'invoice_total')) {
                $table->decimal('invoice_total', 15, 2)->nullable();
                }
if (!Schema::hasColumn('invoices', 'budget_subtotal')) {
                $table->decimal('budget_subtotal', 15, 2)->nullable();
                }
if (!Schema::hasColumn('invoices', 'budget_taxes')) {
                $table->decimal('budget_taxes', 15, 2)->nullable();
                }
if (!Schema::hasColumn('invoices', 'budget_total')) {
                $table->decimal('budget_total', 15, 2)->nullable();
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('invoice_total');
            $table->dropColumn('budget_subtotal');
            $table->dropColumn('budget_taxes');
            $table->dropColumn('budget_total');
            
        });
Schema::table('invoices', function (Blueprint $table) {
                        $table->double('budget_subtotal', 15, 2)->nullable();
                $table->double('budget_taxes', 15, 2)->nullable();
                $table->double('budget_total', 15, 2)->nullable();
                $table->decimal('money', 15, 2)->nullable();
                $table->string('invoice_total')->nullable();
                
        });

    }
}
