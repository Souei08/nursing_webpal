<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSubmissionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_submission_files', function (Blueprint $table) {
            $table->id();
            $table->string('files_file_name')->nullable();
            $table->integer('files_file_size')->nullable();
            $table->string('files_content_type')->nullable();
            $table->timestamp('files_updated_at')->nullable();
            $table->foreignId('task_submission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('task_submission_files');
    }
}
