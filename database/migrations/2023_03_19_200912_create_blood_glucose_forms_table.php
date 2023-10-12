<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodGlucoseFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_glucose_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->string('room_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('allergies')->nullable();
            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();
            $table->string('patient_id')->nullable();
            $table->longText('referred_to')->nullable();
            $table->longText('insulin_given')->nullable();
            $table->longText('administered_by')->nullable();
            $table->longText('signature')->nullable();
            $table->longText('remarks')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->longText('hgt')->nullable();
            $table->bigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_glucose_forms');
    }
}
