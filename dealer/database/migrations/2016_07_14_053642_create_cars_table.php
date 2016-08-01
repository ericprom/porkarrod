<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('brand_id');
            $table->integer('model_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('year');
            $table->integer('gear');
            $table->string('color');
            $table->string('license');
            $table->text('detail');
            $table->string('budget');
            $table->string('repair');
            $table->string('price');
            $table->integer('owner');
            $table->date('bought_at');
            $table->integer('sold')->default(0);
            $table->string('cash')->nullable();
            $table->string('commission')->nullable();
            $table->date('sold_at')->nullable();
            $table->integer('active')->default(1);
            $table->integer('recommended')->default(0);
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
        Schema::drop('cars');
    }
}
