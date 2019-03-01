<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551452748InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if(Schema::hasColumn('invoices', 'invoice_subtotal')) {
                $table->dropColumn('invoice_subtotal');
            }
            if(Schema::hasColumn('invoices', 'invoice_taxes')) {
                $table->dropColumn('invoice_taxes');
            }
            if(Schema::hasColumn('invoices', 'invoice_total')) {
                $table->dropColumn('invoice_total');
            }
            
        });
Schema::table('invoices', function (Blueprint $table) {
            
if (!Schema::hasColumn('invoices', 'invoice_subtotal')) {
                $table->decimal('invoice_subtotal', 15, 2)->nullable();
                }
if (!Schema::hasColumn('invoices', 'invoice_taxes')) {
                $table->decimal('invoice_taxes', 15, 2)->nullable();
                }
if (!Schema::hasColumn('invoices', 'invoice_total')) {
                $table->string('invoice_total')->nullable();
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
            $table->dropColumn('invoice_subtotal');
            $table->dropColumn('invoice_taxes');
            $table->dropColumn('invoice_total');
            
        });
Schema::table('invoices', function (Blueprint $table) {
                        $table->double('invoice_subtotal', 15, 2)->nullable();
                $table->double('invoice_taxes', 15, 2)->nullable();
                $table->double('invoice_total', 15, 2)->nullable();
                
        });

    }
}
