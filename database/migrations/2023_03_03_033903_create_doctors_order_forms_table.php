<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsOrderFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_order_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('room_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('allergies')->nullable();
            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();
            $table->string('patient_id')->nullable();
            $table->dateTime('doctors_order_date')->nullable();
            $table->longText('progress_note')->nullable();
            $table->longText('doctors_order')->nullable();
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
        Schema::dropIfExists('doctors_order_forms');
    }
}
