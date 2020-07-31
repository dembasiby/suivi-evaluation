<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordonnateursTable extends Migration
{
    public function up()
    {
        Schema::create('coordonnateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
