<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("log_sheets")){
            Schema::create('log_sheets', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("project_id")->default(0);
                $table->bigInteger("item_id")->default(0);
                $table->bigInteger("store_in")->default(0);
                $table->bigInteger("store_out")->default(0);
                $table->bigInteger("blance")->default(0);
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
        Schema::dropIfExists('log_sheets');
    }
}
