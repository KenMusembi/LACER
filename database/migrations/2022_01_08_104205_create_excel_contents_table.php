<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_contents', function (Blueprint $table) {
            $table->id();
            $table->string(  "invoiceNo")->default(NULL)->nullable();
            $table->string(  "stockCode")->default(NULL)->nullable();
            $table->string(  "description")->default(NULL)->nullable();
            $table->string(  "quantity")->default(NULL)->nullable();
            $table->string(  "invoiceDate")->default(NULL)->nullable();
            $table->string(  "unitPrice")->default(NULL)->nullable();
            $table->string(  "customerID")->default(NULL)->nullable();
            $table->string(  "country")->default(NULL)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_contents');
    }
}
