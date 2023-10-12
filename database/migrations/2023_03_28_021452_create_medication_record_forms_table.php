<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationRecordFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_record_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('allergies')->nullable();
            $table->string('gender')->nullable();
            $table->string('room_no')->nullable();

            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();

            $table->date('date')->nullable();
            $table->string('patient_id')->nullable();

            $table->dateTime('prn_date_ordered')->nullable();
            $table->string('prn_medication')->nullable();
            $table->dateTime('prn_date_time')->nullable();
            $table->string('prn_remarks')->nullable();
            $table->string('prn')->nullable();

            $table->date('single_order_stat_date_ordered')->nullable();
            $table->string('single_order_stat_medication')->nullable();
            $table->dateTime('single_order_stat_date_time')->nullable();
            $table->string('single_order_stat_remarks')->nullable();
            $table->string('single_order_stat')->nullable();

            $table->dateTime('date_ordered')->nullable();
            $table->string('medication')->nullable();
            $table->dateTime('date_time_given')->nullable();
            $table->string('initials')->nullable();

            $table->string('nurse_staff_first_name')->nullable();
            $table->string('nurse_staff_middle_name')->nullable();
            $table->string('nurse_staff_last_name')->nullable();

            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('medication_record_forms');
    }
}
