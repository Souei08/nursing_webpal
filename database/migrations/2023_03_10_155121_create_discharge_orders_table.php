<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharge_orders', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_last_name')->nullable();

            $table->text('room')->nullable();
            $table->text('case_no')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();

            $table->boolean('may_go_home')->default(false);
            $table->boolean('home_against_advice')->default(false);

            $table->longText('medications')->nullable();
            $table->dateTime('follow_up_at')->nullable();
            $table->text('follow_up_address')->nullable();

            $table->longText('laboratory_request')->nullable();
            $table->longText('laboratory_results_for_follow_up')->nullable();
            $table->longText('advised')->nullable();

            $table->string('attending_physician_first_name')->nullable();
            $table->string('attending_physician_middle_name')->nullable();
            $table->string('attending_physician_last_name')->nullable();

            $table->bigInteger('created_by')->nullable();
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
        Schema::dropIfExists('discharge_orders');
    }
}
