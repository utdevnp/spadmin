<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodStoreOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable("good_store_outs")){
            Schema::create('good_store_outs', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("project_id")->nullable();
                $table->string("grn_out_number");
                $table->string("submitted_date");
                $table->string("required_date")->nullable();
                $table->string("issue_date")->nullable();
                $table->string("invoice_date");
                $table->bigInteger("purpose_activity")->nullable();
                $table->bigInteger("item_name");
                $table->bigInteger("unit");
                $table->bigInteger("quantity_required");
                $table->bigInteger("quantity_issued");
                $table->text("recived_by")->nullable();
                $table->bigInteger("request_by")->nullable();
                $table->bigInteger("approved_by")->nullable();
                $table->bigInteger("issue_by")->nullable();
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
        Schema::dropIfExists('good_store_outs');
    }
}
