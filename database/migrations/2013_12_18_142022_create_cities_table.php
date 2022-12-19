<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 255);
            $table->unsignedMediumInteger('state_id')->index('cities_test_ibfk_1');
            $table->string('state_code', 255);
            $table->unsignedMediumInteger('country_id')->index('cities_test_ibfk_2');
            $table->char('country_code', 2);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamp('created_at')->default('2014-01-01 06:31:01');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->boolean('flag')->default(true);
            $table->string('wikiDataId', 255)->nullable()->comment('Rapid API GeoDB Cities');

            $table->foreign(['country_id'], 'cities_ibfk_2')->references(['id'])->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}