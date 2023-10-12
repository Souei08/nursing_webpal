<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespiratorySystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respiratory_systems', function (Blueprint $table) {
            $table->id();

            $table->string('rs_clear')->nullable();
            $table->string('rs_location_r')->nullable();
            $table->string('rs_location_l')->nullable();
            $table->string('rs_location_adventitous')->nullable();

            $table->string('rs_adventitous_specify')->nullable();
            $table->string('rs_location')->nullable();

            $table->string('rs_lpm')->nullable();
            $table->string('rs_via')->nullable();

            $table->string('rs_oxygen')->nullable();
            $table->string('rs_intubated')->nullable();
            $table->string('rs_cpap')->nullable();
            $table->string('rs_bipap')->nullable();
            $table->string('rs_et_tube')->nullable();

            $table->string('rs_size')->nullable();
            $table->string('rs_level')->nullable();

            $table->string('rs_f')->nullable();
            $table->string('rs_rr')->nullable();
            $table->string('rs_peep')->nullable();
            $table->string('rs_tv')->nullable();
            $table->string('rs_ie')->nullable();
            $table->string('rs_sat')->nullable();

            $table->string('rs_others')->nullable();
            $table->string('rs_shift')->nullable();

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
        Schema::dropIfExists('respiratory_systems');
    }
}
