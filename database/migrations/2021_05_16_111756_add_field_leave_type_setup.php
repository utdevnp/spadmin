<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldLeaveTypeSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn("leave_type_setups","total_hour")){
            Schema::table('leave_type_setups', function (Blueprint $table) {
                $table->string("total_hour")->default(0);
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
        Schema::table('leave_type_setups', function (Blueprint $table) {
            //
        });
    }
}
