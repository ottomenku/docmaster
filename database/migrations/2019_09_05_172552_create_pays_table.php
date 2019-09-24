<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');       
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->string('action_id')->nullable(); //barion azonosító (Transactions->POSTransactionId) , paypal_id, bitcoin táca stb
            $table->integer('billingdata_id')->nullable();  //számlázasi adatok
            $table->string('order_id')->nullable(); //csomag azonosító egyenlőre min,base,vagy max controllerben definiálva
            $table->integer('type')->nullable();  //barion ,cash, paypal...
            $table->integer('total');
            $table->text('note')->nullable();    
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
        Schema::drop('pays');
    }
}
