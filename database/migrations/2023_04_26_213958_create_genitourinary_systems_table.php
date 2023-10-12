<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenitourinarySystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genitourinary_systems', function (Blueprint $table) {
            $table->id();

            $table->string('gen_freely')->nullable();
            $table->string('gen_incontinence')->nullable();
            $table->string('gen_dysuria')->nullable();
            $table->string('gen_anuria')->nullable();
            $table->string('gen_urine_color_clear')->nullable();

            $table->string('gen_urine_color_clear_others')->nullable();

            $table->string('gen_catheterized_yes')->nullable();
            $table->string('gen_catheterized_no')->nullable();

            $table->string('gen_fr')->nullable();
            $table->date('gen_date_insertion')->nullable();

            $table->string('gen_others')->nullable();

            $table->string('gen_shift')->nullable();

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
        Schema::dropIfExists('genitourinary_systems');
    }
}
