<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegumentarySystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integumentary_systems', function (Blueprint $table) {
            $table->id();
            $table->string('is_color_specify')->nullable();

            $table->string('is_score')->nullable();
            $table->string('is_risk_lvl')->nullable();

            $table->string('is_change_position')->nullable();
            $table->string('is_air_mattress')->nullable();
            $table->string('is_dressing')->nullable();
            $table->string('is_medication')->nullable();

            $table->string('is_intervention_others')->nullable();

            $table->string('is_skin_tugor_good')->nullable();
            $table->string('is_skin_tugor_poor')->nullable();

            $table->string('is_integrity_intact')->nullable();
            $table->string('is_integrity_nonintact')->nullable();

            $table->string('is_others')->nullable();

            $table->string('is_shift')->nullable();

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
        Schema::dropIfExists('integumentary_systems');
    }
}
