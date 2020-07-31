<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPointFocalsTable extends Migration
{
    public function up()
    {
        Schema::table('point_focals', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_1918424')->references('id')->on('users');
        });
    }
}
