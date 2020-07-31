<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReponsesTable extends Migration
{
    public function up()
    {
        Schema::table('reponses', function (Blueprint $table) {
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_fk_1918407')->references('id')->on('questions');
            $table->unsignedInteger('questionnaire_id');
            $table->foreign('questionnaire_id', 'questionnaire_fk_1918408')->references('id')->on('questionnaires');
        });
    }
}
