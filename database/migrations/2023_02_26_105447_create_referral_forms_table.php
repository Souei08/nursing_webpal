<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_forms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('patient_no')->nullable();
            $table->longText('problem_referred')->nullable();
            $table->enum('for', ['Referral', 'Co-management'])->nullable();
            $table->enum('referred_to', ['Consent for Referral', 'Refused Referral'])->nullable();

            $table->string('referrer_first_name')->nullable();
            $table->string('referrer_middle_name')->nullable();
            $table->string('referrer_last_name')->nullable();
            $table->string('referrer_relationship_to_patient')->nullable();

            $table->longText('subjective_findings')->nullable();
            $table->longText('objective_findings')->nullable();
            $table->longText('assessment')->nullable();
            $table->longText('plan')->nullable();
            $table->string('consultant_first_name')->nullable();
            $table->string('consultant_middle_name')->nullable();
            $table->string('consultant_last_name')->nullable();

            $table->bigInteger('created_by')->nullable();
            $table->dateTime('consulted_at')->nullable();
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
        Schema::dropIfExists('referral_forms');
    }
}
