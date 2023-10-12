<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardiovascularSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardiovascular_systems', function (Blueprint $table) {
            $table->id();

            $table->string('cs_regular')->nullable();
            $table->string('cs_irregular')->nullable();
            $table->string('cs_weak')->nullable();
            $table->string('cs_bounding')->nullable();

            $table->string('cs_secs')->nullable();

            $table->string('cs_no')->nullable();
            $table->string('cs_yes')->nullable();

            $table->string('cs_location')->nullable();
            $table->string('cs_others')->nullable();

            $table->string('cs_shift')->nullable();

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
        Schema::dropIfExists('cardiovascular_systems');
    }
}
