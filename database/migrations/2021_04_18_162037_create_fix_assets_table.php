<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("fix_assets")){
            Schema::create('fix_assets', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("name_chart_id");
                $table->bigInteger("category_id");
                $table->bigInteger("item_id");
                $table->string("purchase_date")->nullable();
                $table->bigInteger("quantity");
                $table->bigInteger("rate");
                $table->string("condition")->nullable();
                $table->bigInteger("supplier_id")->nullable();
                $table->string("assets_location")->nullable();
                $table->string("responsable_person")->nullable();
                $table->bigInteger("user_id")->nullable();
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
        Schema::dropIfExists('fix_assets');
    }
}
