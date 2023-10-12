<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFluidBalanceSheetFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluid_balance_sheet_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();

            $table->string('gender')->nullable();
            $table->string('allergies')->nullable();
            $table->string('room_no')->nullable();
            $table->date('date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();

            $table->string('first_shift_ivf_one')->nullable();
            $table->string('first_shift_ivf_two')->nullable();
            $table->string('first_shift_intake_others')->nullable();
            $table->string('first_shift_blood')->nullable();
            $table->string('first_shift_tpn')->nullable();
            $table->string('first_shift_tube')->nullable();
            $table->string('first_shift_oral')->nullable();
            $table->string('first_shift_urine')->nullable();
            $table->string('first_shift_drain')->nullable();
            $table->string('first_shift_stool')->nullable();
            $table->string('first_shift_output_others')->nullable();
            $table->string('first_shift_total')->nullable();
            $table->string('first_shift_total_per_shift_intake')->nullable();
            $table->string('first_shift_total_per_shift_output')->nullable();
            $table->string('first_shift_balance_per_shift')->nullable();
            $table->string('first_shift_nod')->nullable();

            $table->string('second_shift_ivf_one')->nullable();
            $table->string('second_shift_ivf_two')->nullable();
            $table->string('second_shift_intake_others')->nullable();
            $table->string('second_shift_blood')->nullable();
            $table->string('second_shift_tpn')->nullable();
            $table->string('second_shift_tube')->nullable();
            $table->string('second_shift_oral')->nullable();
            $table->string('second_shift_urine')->nullable();
            $table->string('second_shift_drain')->nullable();
            $table->string('second_shift_stool')->nullable();
            $table->string('second_shift_output_others')->nullable();
            $table->string('second_shift_total')->nullable();
            $table->string('second_shift_total_per_shift_intake')->nullable();
            $table->string('second_shift_total_per_shift_output')->nullable();
            $table->string('second_shift_balance_per_shift')->nullable();
            $table->string('second_shift_nod')->nullable();

            $table->string('third_shift_ivf_one')->nullable();
            $table->string('third_shift_ivf_two')->nullable();
            $table->string('third_shift_intake_others')->nullable();
            $table->string('third_shift_blood')->nullable();
            $table->string('third_shift_tpn')->nullable();
            $table->string('third_shift_tube')->nullable();
            $table->string('third_shift_oral')->nullable();
            $table->string('third_shift_urine')->nullable();
            $table->string('third_shift_drain')->nullable();
            $table->string('third_shift_stool')->nullable();
            $table->string('third_shift_output_others')->nullable();
            $table->string('third_shift_total')->nullable();
            $table->string('third_shift_total_per_shift_intake')->nullable();
            $table->string('third_shift_total_per_shift_output')->nullable();
            $table->string('third_shift_balance_per_shift')->nullable();
            $table->string('third_shift_nod')->nullable();

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
        Schema::dropIfExists('fluid_balance_sheet_forms');
    }
}
