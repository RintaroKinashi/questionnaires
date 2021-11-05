<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQuestionnaireIdToRAnsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_ansers', function (Blueprint $table) {
            $table->unsignedBigInteger('questionnaire_id')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('r_ansers', function (Blueprint $table) {
            $table->dropColumn('questionnaire_id');
        });
    }
}
