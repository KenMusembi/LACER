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
            $table->bigInteger("invoiceNo");//536368
            $table->string( "stockCode");//85123A
            $table->string(  "description");
            $table->bigInteger(  "quantity");//2
            $table->date("invoiceDate");//12/1/2010 8:26
            $table->float(  "unitPrice");//2.55
            $table->bigInteger(  "customerID");//17850
            $table->string(  "country");//United Kingdom
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
