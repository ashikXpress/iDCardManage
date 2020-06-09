<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficerWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_workers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('officer_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('id_card_category_id');
            $table->string('name');
            $table->string('father_or_husband');
            $table->date('date_of_birth');
            $table->string('designation');
            $table->tinyInteger('age');
            $table->string('profession');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('mobile_number')->unique()->nullable();
            $table->string('national_id_or_birth_certificate_no')->nullable();
            $table->string('national_id_or_birth_certificate_photo')->nullable();
            $table->string('identification_sign');
            $table->string('worker_photo');
            $table->string('worker_signature');
            $table->date('delivery_date')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('officer_workers');
    }
}
