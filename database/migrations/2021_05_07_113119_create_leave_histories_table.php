<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("leave_histories")){
            Schema::create('leave_histories', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("leave_id");
                $table->bigInteger("requested_by")->nullable();
                $table->string("status")->nullable();
                $table->bigInteger("approved_by")->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('leave_histories');
    }
}
