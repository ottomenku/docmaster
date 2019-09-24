<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarionsTable extends Migration
{
    /**
     * Run the migrations.['user_id','payment_id','billingdata_id','order_id','status','fulljson'];
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barions', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('billingdata_id')->nullable(); //zámlázasi adataok
            $table->string('payment_id'); //A get-ben küldött barion azonosító (PaymentId)  Postban is elküldi  
            $table->string('order_id')->nullable(); //csomag azonosító (base, min, max)
            $table->string('transaction_d'); //Json: Transactions->POSTransactionId
            $table->integer('total')->nullable();
            $table->string('status'); // prepared,Sucedeed stb..
            $table->string('script')->nullable(); //callback, redirect..
            $table->json('fulljson');  //A teljes Json válasz.
            $table->json('errors')->nullable();   // a teljes json tartalmazza csak az átlathatóság  és a könyebb  kereshetőség miatt
            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('barions');
    }
}
