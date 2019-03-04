<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7d374e49c775c7d374e40a58InternalNotificationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('internal_notification_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('internal_notification_user')) {
            Schema::create('internal_notification_user', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('internal_notification_id')->unsigned()->nullable();
            $table->foreign('internal_notification_id', 'fk_p_273584_273543_user_i_5c7d171ab777e')->references('id')->on('internal_notifications');
                $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_273543_273584_intern_5c7d171ab5e15')->references('id')->on('users');
                
                $table->timestamps();
                
            });
        }
    }
}
