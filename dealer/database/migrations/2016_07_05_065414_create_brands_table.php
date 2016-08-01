<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('active')->default(1);
            $table->timestamps();
        });

        DB::table('brands')->insert(array(
            array('title' => 'Toyota','active'=>1), 
            array('title' => 'Honda','active'=>1), 
            array('title' => 'Nissan','active'=>1), 
            array('title' => 'Mitsubishi','active'=>1), 
            array('title' => 'Isuzu','active'=>1), 
            array('title' => 'Benz','active'=>1), 
            array('title' => 'BMW','active'=>1), 
            array('title' => 'Mazda','active'=>1), 
            array('title' => 'Ford','active'=>1), 
            array('title' => 'Chevrolet','active'=>1), 
            array('title' => 'Volvo','active'=>1), 
            array('title' => 'Alfa Romeo','active'=>1), 
            array('title' => 'Aston Martin','active'=>1), 
            array('title' => 'Audi','active'=>1), 
            array('title' => 'Austin','active'=>1), 
            array('title' => 'Bentley','active'=>1), 
            array('title' => 'Cadillac','active'=>1), 
            array('title' => 'Chrysler','active'=>1), 
            array('title' => 'Citroen','active'=>1), 
            array('title' => 'Daewoo','active'=>1), 
            array('title' => 'Daihatsu','active'=>1), 
            array('title' => 'DFM','active'=>1), 
            array('title' => 'Ferrari','active'=>1), 
            array('title' => 'Fiat','active'=>1), 
            array('title' => 'GMC','active'=>1), 
            array('title' => 'Hummer','active'=>1), 
            array('title' => 'Hyundai','active'=>1), 
            array('title' => 'Jaguar','active'=>1), 
            array('title' => 'Jeep','active'=>1), 
            array('title' => 'Kia','active'=>1), 
            array('title' => 'Lamborghini','active'=>1), 
            array('title' => 'Lancia','active'=>1), 
            array('title' => 'Land Rover','active'=>1), 
            array('title' => 'Lexus','active'=>1), 
            array('title' => 'Lotus','active'=>1), 
            array('title' => 'Maserati','active'=>1), 
            array('title' => 'MG','active'=>1), 
            array('title' => 'Mini','active'=>1), 
            array('title' => 'Opel','active'=>1), 
            array('title' => 'Peugeot','active'=>1), 
            array('title' => 'Porsche','active'=>1), 
            array('title' => 'Proton','active'=>1), 
            array('title' => 'Renault','active'=>1), 
            array('title' => 'Rolls-Royce','active'=>1), 
            array('title' => 'Rover','active'=>1), 
            array('title' => 'SAAB','active'=>1), 
            array('title' => 'Skoda','active'=>1), 
            array('title' => 'Smart','active'=>1), 
            array('title' => 'Ssangyong','active'=>1), 
            array('title' => 'Subaru','active'=>1), 
            array('title' => 'Suzuki','active'=>1), 
            array('title' => 'Tesla','active'=>1), 
            array('title' => 'Volkswagen','active'=>1), 
            array('title' => 'ยี่ห้ออื่นๆ','active'=>1)                           
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brands');
    }
}
