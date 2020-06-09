<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->string('ba_number')->unique();
            $table->string('name');
            $table->string('designation');
            $table->string('unit_or_institute_or_center');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('mobile_number')->unique();
            $table->string('email')->unique();
            $table->string('service_id_card_photo');
            $table->string('officer_photo');
            $table->string('officer_signature_photo');
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
        Schema::dropIfExists('officers');
    }
}
