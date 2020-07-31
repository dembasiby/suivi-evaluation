<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedInteger('parametre_id');
            $table->foreign('parametre_id', 'parametre_fk_1918384')->references('id')->on('parametres');
            $table->unsignedInteger('type_question_id');
            $table->foreign('type_question_id', 'type_question_fk_1918395')->references('id')->on('type_questions');
        });
    }
}
