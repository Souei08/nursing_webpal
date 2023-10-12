<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePainAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pain_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('pa_pain_yes')->nullable();
            $table->string('pa_pain_no')->nullable();

            $table->string('pa_score')->nullable();
            $table->string('pa_tool_used')->nullable();

            $table->string('pa_tool_pattern')->nullable();
            $table->string('pa_tool_pattern_blank')->nullable();

            $table->string('pa_tool_quality')->nullable();
            $table->string('pa_tool_quality_blank')->nullable();

            $table->string('pa_tool_region')->nullable();
            $table->string('pa_tool_region_blank')->nullable();

            $table->string('pa_tool_severity')->nullable();
            $table->string('pa_tool_severity_blank')->nullable();

            $table->string('pa_others')->nullable();

            $table->string('pa_shift')->nullable();

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
        Schema::dropIfExists('pain_assessments');
    }
}
