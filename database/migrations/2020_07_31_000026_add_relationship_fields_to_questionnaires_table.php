<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionnairesTable extends Migration
{
    public function up()
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->unsignedInteger('organisation_id');
            $table->foreign('organisation_id', 'organisation_fk_1918421')->references('id')->on('organisations');
        });
    }
}
