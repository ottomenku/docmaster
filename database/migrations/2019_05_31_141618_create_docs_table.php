<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.['category_id', 'name', 'originalname','filename', 'ext','prev','thumb','sizekb','note'];
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('originalname')->nullable();
            $table->string('filename')->nullable();
            $table->string('ext')->nullable();
            $table->string('prew')->nullable();
//$table->string('path')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('sizekb')->nullable();
            $table->string('note')->nullable();
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
