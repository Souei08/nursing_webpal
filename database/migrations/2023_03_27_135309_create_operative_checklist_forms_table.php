<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperativeChecklistFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operative_checklist_forms', function (Blueprint $table) {
            $table->id();
            $table->text('patient_first_name')->nullable();
            $table->text('patient_middle_name')->nullable();
            $table->text('patient_last_name')->nullable();

            $table->text('room_no')->nullable();
            $table->date('date_of_surgery')->nullable();
            $table->text('sex')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('case_no')->nullable();

            $table->text('attending_physician_first_name')->nullable();
            $table->text('attending_physician_middle_name')->nullable();
            $table->text('attending_physician_last_name')->nullable();

            $table->text('surgeon_first_name')->nullable();
            $table->text('surgeon_middle_name')->nullable();
            $table->text('surgeon_last_name')->nullable();

            $table->text('anesthesiologist_first_name')->nullable();
            $table->text('anesthesiologist_middle_name')->nullable();
            $table->text('anesthesiologist_last_name')->nullable();

            $table->longText('preoperative_diagnosis')->nullable();

            $table->text('operative_cl_1')->nullable();
            $table->text('operative_cl_2')->nullable();

            $table->text('operative_cl_3')->nullable();
            $table->text('operative_cl_3_physician_first_name')->nullable();
            $table->text('operative_cl_3_physician_middle_name')->nullable();
            $table->text('operative_cl_3_physician_last_name')->nullable();

            $table->text('operative_cl_4')->nullable();
            $table->text('operative_cl_5')->nullable();

            $table->text('operative_cl_6')->nullable();
            $table->dateTime('operative_cl_6_npo_date_time')->nullable();

            $table->text('operative_cl_7_a')->nullable();
            $table->text('operative_cl_7_b')->nullable();

            $table->text('operative_cl_8')->nullable();
            $table->text('operative_cl_9')->nullable();
            $table->text('operative_cl_10')->nullable();
            $table->text('operative_cl_11')->nullable();
            $table->text('operative_cl_12')->nullable();
            $table->text('operative_cl_13')->nullable();

            $table->text('operative_cl_14')->nullable();
            $table->text('operative_cl_14_units_ordered')->nullable();
            $table->text('operative_cl_14_units_avail')->nullable();
            $table->text('operative_cl_14_type')->nullable();
            $table->text('operative_cl_14_serial_number')->nullable();
            $table->text('operative_cl_14_crossed_match')->nullable();
            $table->text('operative_cl_14_kind')->nullable();
            $table->text('operative_cl_14_kind_cl_1')->nullable();
            $table->text('operative_cl_14_kind_cl_2')->nullable();
            $table->text('operative_cl_14_kind_cl_3')->nullable();
            $table->text('operative_cl_14_kind_cl_4')->nullable();
            $table->text('operative_cl_14_kind_cl_5')->nullable();
            $table->text('operative_cl_14_kind_cl_others')->nullable();

            $table->text('operative_cl_15')->nullable();
            $table->text('operative_cl_15_solution_type')->nullable();
            $table->text('operative_cl_15_remaining_amount')->nullable();

            $table->text('operative_cl_16')->nullable();
            $table->text('operative_cl_16_temp')->nullable();
            $table->text('operative_cl_16_bp')->nullable();
            $table->text('operative_cl_16_pulse')->nullable();
            $table->text('operative_cl_16_resp')->nullable();
            $table->dateTime('operative_cl_16_time')->nullable();

            $table->text('operative_cl_17')->nullable();
            $table->text('operative_cl_17_drainage_amount')->nullable();
            $table->dateTime('operative_cl_17_voided_time')->nullable();

            $table->text('operative_cl_18')->nullable();
            $table->text('operative_cl_19')->nullable();
            $table->text('operative_cl_20')->nullable();

            $table->text('operative_cl_21')->nullable();
            $table->text('operative_cl_21_preop_med_given')->nullable();
            $table->text('operative_cl_21_dosage')->nullable();
            $table->text('operative_cl_21_route_site')->nullable();
            $table->dateTime('operative_cl_21_time_given')->nullable();

            $table->text('operative_cl_22')->nullable();
            $table->text('operative_cl_22_time_transferred_to_or')->nullable();

            $table->text('operative_cl_23')->nullable();
            $table->text('operative_cl_23_orderly_name')->nullable();
            $table->text('operative_cl_23_nurse_on_duty_name')->nullable();

            $table->text('operative_cl_24')->nullable();
            $table->text('operative_cl_24_nurse_on_duty_name')->nullable();
            $table->dateTime('operative_cl_24_date_time')->nullable();

            $table->text('operative_cl_25')->nullable();
            $table->dateTime('operative_cl_25_time_patient_rcvd_in_or')->nullable();
            $table->text('operative_cl_25_or_nurse_on_duty')->nullable();

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
        Schema::dropIfExists('operative_checklist_forms');
    }
}
