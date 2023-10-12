<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusculosketalSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musculosketal_systems', function (Blueprint $table) {
            $table->id();

            $table->string('ms_posture')->nullable();
            $table->string('ms_posture_others')->nullable();

            $table->string('ms_gait')->nullable();
            $table->string('ms_gait_others')->nullable();

            $table->string('ms_rom')->nullable();
            $table->string('ms_rom_others')->nullable();

            $table->string('ms_assistive_device')->nullable();
            $table->string('ms_contraption')->nullable();
            $table->string('ms_mfs_score')->nullable();

            $table->string('ms_mfs_side_rails_yes')->nullable();
            $table->string('ms_mfs_side_rails_no')->nullable();

            $table->string('ms_others')->nullable();
            $table->string('ms_shift')->nullable();


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
        Schema::dropIfExists('musculosketal_systems');
    }
}
