<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveCalculatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(! Schema::hasTable('leave_calculates')){
            Schema::create('leave_calculates', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("leave_type")->default("0");
                $table->bigInteger("user_id")->default("0");
                $table->bigInteger("total_hour")->default("0");
                $table->bigInteger("remain_leave")->default(0);
                $table->bigInteger("fiscal_year")->default("0");
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
        Schema::dropIfExists('leave_calculates');
    }
}
