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
            if (\App::VERSION() >= '5.8') {
                $table->bigInteger('user_id')->unsigned();
            } else {
                $table->integer('user_id')->unsigned();
            }
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('admin_id');
        /*    $table->foreign('admin_id')
                ->references('id')
                ->on('users');*/
            $table->string('action_id')->nullable(); //barion azonosító :transaction_id, postransactionId:(Transactions->POSTransactionId) , paypal_id, bitcoin táca stb
           
            $table->integer('billingdata_id')->unsigned();  //számlázasi adatok
            $table->foreign('billingdata_id')
                ->references('id')
                ->on('billingdata');
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
