<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('leaves')){
            Schema::create('leaves', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("user_id");
                $table->string("leave_form");
                $table->string("project_id");
                $table->string("leave_to");
                $table->bigInteger("leave_type_id");
                $table->string("leave_hour");
                $table->bigInteger("request_by")->nullable();
                $table->bigInteger("submitted_to")->nullable();
                $table->bigInteger("standing_person_id")->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
