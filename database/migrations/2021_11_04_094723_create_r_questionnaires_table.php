<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionnaire_id');
            $table->string('question_title');
            $table->text('q1');
            $table->text('q2');
            $table->text('q3');
            $table->text('q4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_questionnaires');
    }
}
