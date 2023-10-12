<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperativeClearanceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operative_clearance_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();

            $table->string('room_no')->nullable();

            $table->date('date_of_surgery')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('sex')->nullable();
            $table->text('case_no')->nullable();

            $table->string('attending_physician_fname')->nullable();
            $table->string('attending_physician_mname')->nullable();
            $table->string('attending_physician_lname')->nullable();

            $table->string('working_diagnosis')->nullable();
            $table->string('surgery_contemplated')->nullable();
            $table->string('anesthesia_contemplated')->nullable();
            $table->string('tentative_sched')->nullable();
            $table->longText('history')->nullable();
            $table->string('smoking')->nullable();
            $table->string('alcohol_intake')->nullable();
            $table->string('allergies')->nullable();
            $table->string('prev_hospitalization')->nullable();
            $table->string('prev_operation')->nullable();
            $table->string('recent_med_intake')->nullable();

            $table->text('normal_general')->nullable();
            $table->text('normal_skin')->nullable();
            $table->text('normal_eent')->nullable();
            $table->text('normal_respiratory')->nullable();
            $table->text('normal_cardio')->nullable();
            $table->text('normal_gastro')->nullable();
            $table->text('normal_renal')->nullable();
            $table->text('normal_gyne')->nullable();
            $table->text('normal_male')->nullable();
            $table->text('normal_musculo')->nullable();
            $table->text('normal_hematological')->nullable();
            $table->text('normal_endocrine')->nullable();
            $table->text('normal_nervous')->nullable();

            $table->string('abnormal_general')->nullable();
            $table->string('abnormal_skin')->nullable();
            $table->string('abnormal_eent')->nullable();
            $table->string('abnormal_respiratory')->nullable();
            $table->string('abnormal_cardio')->nullable();
            $table->string('abnormal_gastro')->nullable();
            $table->string('abnormal_renal')->nullable();
            $table->string('abnormal_gyne')->nullable();
            $table->string('abnormal_male')->nullable();
            $table->string('abnormal_musculo')->nullable();
            $table->string('abnormal_hematological')->nullable();
            $table->string('abnormal_endocrine')->nullable();
            $table->string('abnormal_nervous')->nullable();

            $table->text('bp')->nullable();
            $table->text('cr')->nullable();
            $table->text('rr')->nullable();
            $table->text('temp')->nullable();
            $table->text('skin')->nullable();
            $table->text('heent')->nullable();
            $table->text('neck')->nullable();
            $table->text('chest_lungs')->nullable();
            $table->text('heart')->nullable();
            $table->text('abdomen')->nullable();
            $table->text('musculoskeletal')->nullable();
            $table->text('neurological')->nullable();

            $table->string('chest_xray')->nullable();
            $table->string('ecg')->nullable();
            $table->string('echo')->nullable();

            $table->text('cbc')->nullable();
            $table->text('urinalysis')->nullable();
            $table->text('others')->nullable();

            $table->text('fbs')->nullable();
            $table->text('creatinine')->nullable();
            $table->text('sgpt')->nullable();

            $table->text('protime')->nullable();
            $table->text('aptt')->nullable();
            $table->text('bleeding_time')->nullable();


            $table->text('high_risk_surgery')->nullable();
            $table->text('coronary_artery_disease_presence')->nullable();
            $table->text('congestion_heart_failure_presence')->nullable();
            $table->text('cerebrovascular_disease')->nullable();
            $table->text('diabetes_mellitus_insulin')->nullable();
            $table->text('serum_creatinine')->nullable();

            $table->text('total_score_per_yes')->nullable();

            $table->longText('assessment_suggestion_recommendation')->nullable();

            $table->string('medical_consultant_first_name')->nullable();
            $table->string('medical_consultant_middle_name')->nullable();
            $table->string('medical_consultant_last_name')->nullable();

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
        Schema::dropIfExists('operative_clearance_forms');
    }
}
