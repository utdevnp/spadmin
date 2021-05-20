<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsFiecalYearTableDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(! Schema::hasColumn("fiscal_years","start_date")){
            Schema::table('fiscal_years', function (Blueprint $table) {
                $table->string("start_date")->nullable();
                $table->string("end_date")->nullable();
                $table->string("active")->default("0")->nullable();
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
        Schema::table('fiscal_years', function (Blueprint $table) {
            //
        });
    }
}
