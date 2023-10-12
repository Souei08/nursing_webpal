<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntravenousFluidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intravenous_fluids', function (Blueprint $table) {
            $table->id();

            $table->string('intra_fluid_main_line')->nullable();
            $table->string('intra_fluid_side_drip')->nullable();

            $table->string('intra_fluid_side_shift')->nullable();



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
        Schema::dropIfExists('intravenous_fluids');
    }
}
