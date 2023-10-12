<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmittingMedicalHistoryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitting_medical_history_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();
            $table->dateTime('admission_date_time')->nullable();
            $table->longText('chief_complaint')->nullable();

            $table->string('referred_from_hci')->nullable();
            $table->string('yes_reason')->nullable();
            $table->string('originating_hci_name')->nullable();
            $table->longText('present_illness_history')->nullable();
            $table->longText('pertinent_past_medical_history')->nullable();

            $table->string('g')->nullable();
            $table->string('p')->nullable();
            // $table->string('gp_1');
            // $table->string('gp_2');
            // $table->string('gp_3');
            // $table->string('gp_4');
            $table->string('lmp')->nullable();

            $table->string('allergies')->nullable();
            $table->string('smoker')->nullable();
            $table->string('alcohol_drinks')->nullable();

            $table->boolean('altered_mental_sensorium')->default(false);
            $table->boolean('abdominal_cramp_pain')->default(false);
            $table->boolean('anorexia')->default(false);
            $table->boolean('bleeding_gums')->default(false);
            $table->boolean('body_weakness')->default(false);
            $table->boolean('vision_blurring')->default(false);
            $table->boolean('chestpain_discomfort')->default(false);
            $table->boolean('constipation')->default(false);
            $table->boolean('cough')->default(false);

            $table->boolean('diarrhea')->default(false);
            $table->boolean('dizziness')->default(false);
            $table->boolean('dysphagia')->default(false);
            $table->boolean('dyspnea')->default(false);
            $table->boolean('dysuria')->default(false);
            $table->boolean('epistaxis')->default(false);
            $table->boolean('fever')->default(false);
            $table->boolean('urination_frequency')->default(false);
            $table->boolean('headache')->default(false);

            $table->boolean('hematemesis')->default(false);
            $table->boolean('hematuria')->default(false);
            $table->boolean('hemoptysis')->default(false);
            $table->boolean('irritability')->default(false);
            $table->boolean('jaundice')->default(false);
            $table->boolean('lower_extremity_edema')->default(false);
            $table->boolean('myalgia')->default(false);
            $table->boolean('orthopnea')->default(false);
            $table->boolean('pain')->default(false);

            $table->boolean('palpitations')->default(false);
            $table->boolean('seizures')->default(false);
            $table->boolean('skin_rashes')->default(false);
            $table->boolean('stool_bloodyblack_tarrymucoid')->default(false);
            $table->boolean('sweating')->default(false);
            $table->boolean('urgency')->default(false);
            $table->boolean('vomiting')->default(false);
            $table->boolean('weight_loss')->default(false);
            $table->string('symptoms_others')->nullable();

            $table->string('general_survey')->nullable();

            $table->string('bp')->nullable();
            $table->string('hr')->nullable();
            $table->string('rr')->nullable();
            $table->string('temp')->nullable();
            $table->string('sat')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            $table->string('heent')->nullable();
            $table->string('heent_others')->nullable();

            $table->string('chest_lungs')->nullable();
            $table->string('chest_lungs_others')->nullable();

            $table->string('cvs')->nullable();
            $table->string('cvs_others')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('abdomen_others')->nullable();
            $table->string('skin_extremities')->nullable();
            $table->string('skin_extremities_others')->nullable();
            $table->string('neuro_exam')->nullable();
            $table->string('neuro_exam_others')->nullable();
            $table->string('gu')->nullable();
            $table->string('gu_others')->nullable();
            $table->string('digital_rectal')->nullable();
            $table->string('digital_rectal_others')->nullable();

            $table->string('eyes_open')->nullable();
            $table->string('best_verbal_response')->nullable();
            $table->string('best_motor_response')->nullable();
            $table->string('total_score')->nullable();

            $table->longText('admitting_impression')->nullable();

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
        Schema::dropIfExists('admitting_medical_history_forms');
    }
}
