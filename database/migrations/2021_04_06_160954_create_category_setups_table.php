<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_setups')){
            Schema::create('category_setups', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->bigInteger("name_chart_id");
                $table->string("active")->nullable()->default("yes");
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
        Schema::dropIfExists('category_setups');
    }
}
