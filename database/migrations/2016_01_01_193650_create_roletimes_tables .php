<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoletimesTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    

        Schema::create('roletimes', function (Blueprint $table) {       
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('admin_id')->nullable();
            $table->integer('pay_id')->nullable();
          
    /*        $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');*/

           // $table->primary(['permission_id', 'role_id']);
           $table->string('note')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
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
        Schema::drop('roletimes');
    }
}
