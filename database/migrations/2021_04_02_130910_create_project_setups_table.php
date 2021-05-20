<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("project_setups")){
            Schema::create('project_setups', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->string("start_from")->nullable();
                $table->string("end_to")->nullable();
                $table->string("status")->default("Y");
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
        Schema::dropIfExists('project_setups');
    }
}
