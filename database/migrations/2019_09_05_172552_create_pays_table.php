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
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->integer('pay_id')->nullable(); //egyenlőre barion azonosító , lehet paypal_id, bitcoin táca stb
            $table->integer('billingdata_id');
            $table->integer('plan_id'); //csomag azonosító egyenlőre 1,2,vagy 3 controllerben definiálva
            $table->integer('nyugtaszam')->nullable(); // ha állítottak ki számlát
            $table->integer('total');
            $table->text('note')->nullable();
            $table->string('status')->nullable();
            
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
