<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
        DB::table('roles')->insert(array(
            array('title' => 'เต้น','active'=>1), 
            array('title' => 'ผู้ดำเนินการ','active'=>1), 
            array('title' => 'ผู้ลงทุน','active'=>1)                    
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
