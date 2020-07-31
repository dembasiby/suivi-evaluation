<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoordonnateursTable extends Migration
{
    public function up()
    {
        Schema::table('coordonnateurs', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_1918490')->references('id')->on('users');
        });
    }
}
