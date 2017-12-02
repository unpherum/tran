<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('from_company');
            $table->string('from_country');
            $table->string('from_country_prefix');
            $table->integer('from_zipcode');
            $table->string('from_city');
            $table->string('from_address');

            $table->string('to_company');
            $table->string('to_country');
            $table->string('to_country_prefix');
            $table->integer('to_zipcode');
            $table->string('to_city');
            $table->string('to_address');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone');
            $table->string('email');
            
            $table->string('shippingdate');
            $table->string('transporter');
            $table->double('price')->nullable();
            $table->string('status')->default(0);

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
        Schema::dropIfExists('shipments');
    }
}
