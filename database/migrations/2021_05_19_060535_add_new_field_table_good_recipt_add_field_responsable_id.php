<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldTableGoodReciptAddFieldResponsableId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn("good_receipts","responsable_person")){
            Schema::table('good_receipts', function (Blueprint $table) {
                $table->bigInteger("responsable_person")->nullable();
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
        Schema::table('good_receipts', function (Blueprint $table) {
            //
        });
    }
}
