<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargeClinicalSummaryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharge_clinical_summary_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('hospital_no')->nullable();
            $table->text('address')->nullable();

            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();

            $table->date('date_admitted')->nullable();
            $table->date('date_discharged')->nullable();

            $table->longText('chief_complaint')->nullable();
            $table->longText('brief_clinical_summary')->nullable();
            $table->longText('physician_examination')->nullable();

            $table->string('bp')->nullable();
            $table->string('cr')->nullable();
            $table->string('rr')->nullable();
            $table->string('temp')->nullable();
            $table->longtext('abdomen')->nullable();
            $table->longtext('heent')->nullable();
            $table->string('gu')->nullable();
            $table->string('chest_lungs')->nullable();
            $table->string('skin_extremities')->nullable();
            $table->string('cvs')->nullable();
            $table->string('cns')->nullable();

            $table->longtext('laboratory_findings')->nullable();
            $table->longtext('treatment_course')->nullable();
            $table->longtext('final_diagnosis')->nullable();
            $table->longtext('recommendation')->nullable();
            $table->longtext('disposition_discharge')->nullable();

            $table->string('resident_incharge_first_name')->nullable();
            $table->string('resident_incharge_middle_name')->nullable();
            $table->string('resident_incharge_last_name')->nullable();

            $table->dateTime('date_accomplished')->nullable();

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
        Schema::dropIfExists('discharge_clinical_summary_forms');
    }
}
