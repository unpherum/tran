<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shipments_id');
            $table->json('parcel');
            $table->string('label_encoded')->nullable();
            $table->string('custom_label_text')->nullable();
            $table->integer('parcelnumber')->nullable();
            $table->string('barcode')->nullable();
            $table->string('referencenumber')->nullable();
            $table->string('label_type')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('parcels');
    }
}
