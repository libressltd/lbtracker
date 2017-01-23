<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLBTRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LBT_requests', function (Blueprint $table) {
            $table->char('id', 32);
            $table->string("HTTP_HOST")->nullable();
            $table->string("REMOTE_ADDR")->nullable();
            $table->string("REQUEST_METHOD")->nullable();
            $table->text("HTTP_USER_AGENT")->nullable();

            $table->char("user_id", 32)->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LBT_requests');
    }
}
