<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }



    // public function up()
    // {
    //     Schema::create('forms', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
    //         $table->string('title')->nullable();
    //         $table->longText('html')->nullable();
    //         $table->boolean('readonly')->default(false);
    //         $table->timestamps();
    //     });
    // }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
