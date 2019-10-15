<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBariontransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *['user_id','billingdata_id','order_id','post_transaction_id','total','days'];
     * @return void
     */
    public function up()
    {
        Schema::create('bariontransactions', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('time');  //lényegében kétkulcsos azonosító masodik kulcsa
            if (\App::VERSION() >= '5.8') {
                $table->bigInteger('user_id')->unsigned();
            } else {
                $table->integer('user_id')->unsigned();
            }
            $table->integer('billingdata_id')->unsigned();  //számlázasi adatok
            $table->foreign('billingdata_id')
                ->references('id')
                ->on('billingdata'); 
            $table->string('order_id')->nullable(); //csomag azonosító (base, min, max)
          //  $table->string('post_transaction_id'); // nem kell mert a saját id+time de a time csak biztonsági  plusz  más asdatbázissal való összefésülhetőség miatt, előááítása egy plusz lekérdezés (last insertid)  és egy plusz update
            $table->integer('total')->nullable(); //nem elég az order_id mert a csomag adatok változhatnak
            $table->integer('days')->nullable(); //nem elég az order_id mert a csomag adatok változhatnak
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
