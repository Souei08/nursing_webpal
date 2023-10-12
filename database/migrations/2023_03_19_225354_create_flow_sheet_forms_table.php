<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowSheetFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_sheet_forms', function (Blueprint $table) {
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

            $table->dateTime('date_time')->nullable();
            $table->longText('iv_bottle_no')->nullable();
            $table->time('time_started')->nullable();
            $table->longText('iv_fluid')->nullable();
            $table->longText('additives')->nullable();
            $table->longText('rate')->nullable();
            $table->longText('signature')->nullable();
            $table->time('time_consumed')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('flow_sheet_forms');
    }
}
