<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastrointestinalSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastrointestinal_systems', function (Blueprint $table) {
            $table->id();

            $table->string('gas_diet')->nullable();

            $table->string('gas_oral')->nullable();
            $table->string('gas_apetite')->nullable();
            $table->string('gas_good')->nullable();
            $table->string('gas_fair')->nullable();
            $table->string('gas_minimal')->nullable();
            $table->string('gas_ngt')->nullable();
            $table->string('gas_r')->nullable();
            $table->string('gas_l')->nullable();
            $table->string('gas_peg')->nullable();

            $table->string('gas_french')->nullable();

            $table->dateTime('gas_date_time')->nullable();

            $table->string('gas_bowel_sound_yes')->nullable();
            $table->string('gas_bowel_sound_no')->nullable();

            $table->string('gas_others')->nullable();
            $table->string('gas_shift')->nullable();

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
        Schema::dropIfExists('gastrointestinal_systems');
    }
}
