<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prefix');
        });

        // Insert default countries
        DB::table('countries')->insert(
            array(
                array(
                    'name' => 'Belguim',
                    'prefix' => 'BE'
                ),
                array(
                    'name' => 'Bulgaria',
                    'prefix' => 'BG'
                ),
                array(
                    'name' => 'Czech Republic',
                    'prefix' => 'CZ'
                ),
                array(
                    'name' => 'Denmark',
                    'prefix' => 'DK'
                ),
                array(
                    'name' => 'Germany',
                    'prefix' => 'DE'
                ),
                array(
                    'name' => 'Estonia',
                    'prefix' => 'EE'
                ),
                array(
                    'name' => 'Ireland',
                    'prefix' => 'IE'
                ),
                array(
                    'name' => 'Greece',
                    'prefix' => 'EL'
                ),
                array(
                    'name' => 'Spain',
                    'prefix' => 'SP'
                ),
                array(
                    'name' => 'France',
                    'prefix' => 'FR'
                ),
                array(
                    'name' => 'Croatia',
                    'prefix' => 'HR'
                ),
                array(
                    'name' => 'Italy',
                    'prefix' => 'IT'
                ),
                
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
