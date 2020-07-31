<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToParametresTable extends Migration
{
    public function up()
    {
        Schema::table('parametres', function (Blueprint $table) {
            $table->unsignedInteger('indicateur_id');
            $table->foreign('indicateur_id', 'indicateur_fk_1918374')->references('id')->on('indicateurs');
        });
    }
}
