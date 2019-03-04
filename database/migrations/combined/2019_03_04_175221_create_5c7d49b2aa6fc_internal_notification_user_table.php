<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5c7d49b2aa6fcInternalNotificationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('internal_notification_user')) {
            Schema::create('internal_notification_user', function (Blueprint $table) {
                $table->integer('internal_notification_id')->unsigned()->nullable();
                $table->foreign('internal_notification_id', 'fk_p_273643_273543_user_i_5c7d49b2aa933')->references('id')->on('internal_notifications')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_273543_273643_intern_5c7d49b2aaab3')->references('id')->on('users')->onDelete('cascade');
                $table->timestamp("read_at")->nullable();
		$table->timestamp("created_at")->default(DB::raw("CURRENT_TIMESTAMP"));
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
        Schema::dropIfExists('internal_notification_user');
    }
}
