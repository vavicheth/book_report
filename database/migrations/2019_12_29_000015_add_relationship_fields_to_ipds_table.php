<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIpdsTable extends Migration
{
    public function up()
    {
        Schema::table('ipds', function (Blueprint $table) {
            $table->unsignedInteger('patient_id');

            $table->foreign('patient_id', 'patient_fk_781139')->references('id')->on('patients');

            $table->unsignedInteger('department_id')->nullable();

            $table->foreign('department_id', 'department_fk_781157')->references('id')->on('departments');

            $table->unsignedInteger('creator_id')->nullable();

            $table->foreign('creator_id', 'creator_fk_783734')->references('id')->on('users');
        });
    }
}
