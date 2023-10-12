<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAdmissionRecordFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_admission_record_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->string('patient_suffix_name')->nullable();

            $table->string('admission_no')->nullable();
            $table->string('patient_id_no')->nullable();
            $table->string('m_r_locator')->nullable();
            $table->string('room_no')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('patient_tel_no')->nullable();
            $table->string('sex')->nullable();
            $table->text('address')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('religion')->nullable();
            $table->string('patient_occupation')->nullable();
            $table->string('patient_company')->nullable();
            $table->string('patient_company_tel')->nullable();
            $table->text('patient_occupation_address')->nullable();
            $table->string('father')->nullable();
            $table->string('f_occupation')->nullable();
            $table->string('f_occupation_address')->nullable();

            $table->string('f_tel_no')->nullable();
            $table->string('mother')->nullable();
            $table->string('m_occupation')->nullable();
            $table->text('m_occupation_address')->nullable();
            $table->string('m_tel_no')->nullable();
            $table->string('spouse')->nullable();
            $table->string('s_occupation')->nullable();
            $table->text('s_occupation_address')->nullable();
            $table->string('s_tel_no')->nullable();
            $table->string('in_case_of_emergency_fullname')->nullable();
            $table->text('e_address')->nullable();
            $table->string('relation_to_patient')->nullable();
            $table->string('e_tel_no')->nullable();
            $table->string('admitting_check_nurse')->nullable();
            $table->longText('hospitalization_plan')->nullable();
            $table->longText('service_type')->nullable();
            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();
            $table->dateTime('admission_date_time')->nullable();
            $table->dateTime('discharge_date_time')->nullable();
            $table->string('guardian_fullname')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->longText('provisional_diagnosis')->nullable();
            $table->longText('discharge_diagnosis')->nullable();
            $table->longText('operations')->nullable();
            $table->string('disposition')->nullable();
            $table->string('result')->nullable();
            $table->string('resident_on_duty')->nullable();

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
        Schema::dropIfExists('patient_admission_record_forms');
    }
}
