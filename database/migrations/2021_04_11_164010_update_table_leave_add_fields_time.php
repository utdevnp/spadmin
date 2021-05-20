<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableLeaveAddFieldsTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn("leaves","leave_start_time")){
            Schema::table('leaves', function (Blueprint $table) {
                $table->string("leave_start_time");
                $table->string("leave_end_time");
                $table->string("status")->default("pending");
                $table->string("approved_by")->nullable();
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
        Schema::table('leaves', function (Blueprint $table) {
            //
        });
    }
}
