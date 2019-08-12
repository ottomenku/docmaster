<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.['category_id', 'name', 'originalname','filename', 'type','prev','sizekb','note'];
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('originalname')->nullable();
            $table->string('filename')->nullable();
            $table->string('type')->nullable();
            $table->string('prev')->nullable();
        //  $table->string('path')->nullable();
        //  $table->string('thumb')->nullable();
            $table->integer('sizekb')->nullable();
            $table->string('note')->nullable();
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
        Schema::drop('docs');
    }
}
