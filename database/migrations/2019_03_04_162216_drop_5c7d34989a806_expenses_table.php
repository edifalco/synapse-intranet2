<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d34989a806ExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('expenses');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
                $table->increments('id');
                $table->date('entry_date')->nullable();
                $table->string('amount');
                
                $table->timestamps();
                
            });
        }
    }
}
