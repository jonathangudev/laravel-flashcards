<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('flashcard_id');
            $table->dateTime('last_tested');
            $table->dateTime('next_test_date');
            $table->integer('study_level');
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
        Schema::dropIfExists('study_records');
    }
}
