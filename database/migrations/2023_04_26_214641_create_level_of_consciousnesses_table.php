<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelOfConsciousnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_of_consciousnesses', function (Blueprint $table) {
            $table->id();

            $table->string('lvl_of_consciousness_conscious')->nullable();
            $table->string('lvl_of_consciousness_lethargic')->nullable();
            $table->string('lvl_of_consciousness_stupor')->nullable();
            $table->string('lvl_of_consciousness_obtunded')->nullable();
            $table->string('lvl_of_consciousness_coma')->nullable();
            $table->string('lvl_of_consciousness_on_sedation')->nullable();
            $table->string('lvl_of_consciousness_e')->nullable();
            $table->string('lvl_of_consciousness_v')->nullable();
            $table->string('lvl_of_consciousness_m')->nullable();
            $table->string('lvl_of_consciousness_equal')->nullable();
            $table->string('lvl_of_consciousness_others')->nullable();
            $table->string('lvl_of_consciousness_shift')->nullable();

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
        Schema::dropIfExists('level_of_consciousnesses');
    }
}
