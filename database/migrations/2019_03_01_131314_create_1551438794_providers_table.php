<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551438794ProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('providers')) {
            Schema::create('providers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('address');
                $table->string('postal_code');
                $table->string('city');
                $table->string('country');
                $table->string('phone');
                $table->string('contact_person');
                $table->string('email');
                
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
        Schema::dropIfExists('providers');
    }
}
