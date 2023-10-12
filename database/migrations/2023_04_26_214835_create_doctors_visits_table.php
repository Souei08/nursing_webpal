<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_visits', function (Blueprint $table) {
            $table->id();

            $table->time('dv_time')->nullable();
            $table->string('dv_doctors_name')->nullable();
            $table->string('dv_remarks')->nullable();

            $table->time('dv_type_time')->nullable();
            $table->string('dv_type')->nullable();

            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('ward_nurses_progress_note_id')->nullable();

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
        Schema::dropIfExists('doctors_visits');
    }
}
