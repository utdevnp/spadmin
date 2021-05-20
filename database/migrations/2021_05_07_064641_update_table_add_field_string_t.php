<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableAddFieldStringT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn("good_store_outs","purpose_activity")){
            Schema::table('good_store_outs', function (Blueprint $table) {
                $table->longText("purpose_activity")->nullable()->change();
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
        Schema::table('good_store_outs', function (Blueprint $table) {
            //
        });
    }
}
