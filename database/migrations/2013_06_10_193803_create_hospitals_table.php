<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('province');
            $table->string('district');
            $table->string('division');
            $table->string('location');
            $table->string('sub_location');
            $table->string('level');
            $table->string('agency');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('email')->unique()->nullable();
            $table->string('emergency_number_one')->nullable();
            $table->string('emergency_number_two')->nullable();
            $table->string('helpline')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('how_to_reach_us')->nullable();
            $table->text('services')->nullable();
            $table->text('facilities')->nullable();
            $table->bigInteger('town_id')->nullable();
            $table->boolean('is_suspended')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('hospitals');
    }
}
