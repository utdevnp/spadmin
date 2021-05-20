<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("documents")){
            Schema::create('documents', function (Blueprint $table) {
                $table->id();
                $table->string("name")->nullable();
                $table->string("file_name")->nullable();
                $table->string("detail")->nullable();
                $table->bigInteger("user_id");
                $table->bigInteger("staff_id");
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
        Schema::dropIfExists('documents');
    }
}
