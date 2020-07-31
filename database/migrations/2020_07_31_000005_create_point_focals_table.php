<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointFocalsTable extends Migration
{
    public function up()
    {
        Schema::create('point_focals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descritpion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
