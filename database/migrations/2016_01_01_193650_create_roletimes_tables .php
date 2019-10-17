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
            if (\App::VERSION() >= '5.8') {
                $table->bigInteger('user_id')->unsigned();
            } else {
                $table->integer('user_id')->unsigned();
            }
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('role_id')->unsigned()->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            
           $table->integer('admin_id')->nullable();
          /*   $table->foreign('admin_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            */
            $table->integer('pay_id')->unsigned()->nullable();
          $table->foreign('pay_id')
                ->references('id')
                ->on('pays')
                ->onDelete('cascade');      
                
           // $table->primary(['permission_id', 'role_id']);
           $table->text('note')->nullable();
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
