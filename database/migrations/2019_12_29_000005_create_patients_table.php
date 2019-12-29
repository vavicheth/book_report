<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('hn')->nullable();

            $table->string('name');

            $table->string('name_kh');

            $table->integer('age');

            $table->string('gender');

            $table->longText('address')->nullable();

            $table->string('phone')->nullable();

            $table->longText('description')->nullable();

            $table->string('nup')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
