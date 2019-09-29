<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations. ['user_id','admin_id','action_id','billingdata_id','order_id','type','total','days','note'];
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');       
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->string('action_id')->nullable(); //barion azonosító í:Transaction_id (Transactions->POSTransactionId) , paypal_id, bitcoin táca stb
            $table->integer('billingdata_id');  //számlázasi adatok
            $table->string('order_id'); //csomag azonosító egyenlőre min,base,vagy max controllerben definiálva
            $table->string('type');  //barion ,cash, paypal...
            $table->integer('total');
            $table->integer('days');
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
