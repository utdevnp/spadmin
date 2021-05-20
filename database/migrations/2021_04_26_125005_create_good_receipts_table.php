<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("good_receipts")){
            Schema::create('good_receipts', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("project_id")->nullable();
                $table->string("grn_number");
                $table->string("purchese_order_number");
                $table->string("recived_date")->nullable();
                $table->string("invoice_number")->nullable();
                $table->string("invoice_date");
                $table->bigInteger("supplier_id")->nullable();
                $table->bigInteger("item_name");
                $table->bigInteger("unit");
                $table->bigInteger("quantity_order");
                $table->bigInteger("quantity_recived");
                $table->text("remarks")->nullable();
                $table->bigInteger("recived_by")->nullable();
                $table->bigInteger("inspect_by")->nullable();
                $table->bigInteger("reviewed_by")->nullable();
                $table->bigInteger("user_id");

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
        Schema::dropIfExists('good_receipts');
    }
}
