<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarionsTable extends Migration
{
    /**  
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('barions', function (Blueprint $table) {

            $table->increments('id');
            $table->string('payment_id'); //A get-ben küldött barion azonosító (PaymentId)  Postban is elküldi
            $table->string('bariontransaction_id'); //Json: Transactions->POSTransactionId elsó fele : transaction_id-időbélyeg+R+randomszám
            $table->string('script')->nullable(); //callback, redirect..
            $table->string('status')->nullable(); 
            $table->json('fulljson')->nullable(); //A teljes Json válasz.
            $table->json('errors')->nullable(); // a teljes json tartalmazza csak az átlathatóság  és a könyebb  kereshetőség miatt
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
