<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesatransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesatransactions', function (Blueprint $table) {
            $table->id();
            $table->string('MerchantRequestID');
            $table->string('CheckoutRequestID');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('appointment_id');
            $table->string('status',200)->nullable();
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
        Schema::dropIfExists('mpesatransactions');
    }
}
