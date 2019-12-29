<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPatientsTable extends Migration
{
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->unsignedInteger('creator_id')->nullable();

            $table->foreign('creator_id', 'creator_fk_783733')->references('id')->on('users');
        });
    }
}
