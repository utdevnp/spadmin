<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("staff")){
            Schema::create('staff', function (Blueprint $table) {
                $table->id();
                $table->string("fy_year")->nullable();
                $table->string("name");
                $table->string("designation")->nullable();
                $table->string("duity_station")->nullable();
                $table->string("join_date")->nullable();
                $table->string("contract_end_date")->nullable();
                $table->bigInteger("project_name")->nullable();
                $table->bigInteger("annual_leave")->nullable();
                $table->bigInteger("sick_leave")->nullable();
                $table->bigInteger("other_leave")->nullable();
                $table->bigInteger("blance_leave")->nullable();
                $table->string("active")->default("yes");
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
        Schema::dropIfExists('staff');
    }
}
