<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubjectCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_codes', function($table) {
            $table->string('start_year')->after('name');
            $table->string('end_year')->after('start_year');
            $table->string('semester')->after('end_year');
            $table->string('term')->after('semester');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_codes', function($table) {
            $table->dropColumn('start_year');
            $table->dropColumn('end_year');
            $table->dropColumn('semester');
            $table->dropColumn('term');
        });
    }
}
