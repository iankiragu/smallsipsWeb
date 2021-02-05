<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('next_of_kin_first_name')->nullable();
            $table->string('next_of_kin_last_name')->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->string('next_of_kin_phone')->nullable();
            $table->bigInteger('role_id');
            $table->string('id_number')->nullable();
            $table->string('license_document')->nullable();
            $table->string('license_no')->nullable();
            $table->boolean('is_verified')->nullable()->default(0);
            $table->boolean('is_suspended')->nullable();
            $table->bigInteger('hospital_id')->nullable();
            $table->bigInteger('specialization_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
