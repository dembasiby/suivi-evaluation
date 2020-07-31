<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFournisseurDonneesTable extends Migration
{
    public function up()
    {
        Schema::table('fournisseur_donnees', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_1918482')->references('id')->on('users');
            $table->unsignedInteger('organisation_id');
            $table->foreign('organisation_id', 'organisation_fk_1918483')->references('id')->on('organisations');
            $table->unsignedInteger('point_focal_id');
            $table->foreign('point_focal_id', 'point_focal_fk_1918484')->references('id')->on('point_focals');
        });
    }
}
