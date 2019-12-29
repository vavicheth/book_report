<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmergenciesTable extends Migration
{
    public function up()
    {
        Schema::table('emergencies', function (Blueprint $table) {
            $table->unsignedInteger('patient_id');

            $table->foreign('patient_id', 'patient_fk_779370')->references('id')->on('patients');

            $table->unsignedInteger('department_id')->nullable();

            $table->foreign('department_id', 'department_fk_779391')->references('id')->on('departments');

            $table->unsignedInteger('creator_id')->nullable();

            $table->foreign('creator_id', 'creator_fk_783711')->references('id')->on('users');
        });
    }
}
