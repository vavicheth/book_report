<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergenciesTable extends Migration
{
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('guardian')->nullable();

            $table->string('age_range')->nullable();

            $table->string('transfer_from')->nullable();

            $table->string('diag_admit')->nullable();

            $table->date('date_start_sick')->nullable();

            $table->datetime('date_admit')->nullable();

            $table->boolean('paraclinic')->default(0)->nullable();

            $table->datetime('date_discharged')->nullable();

            $table->string('diag_discharged')->nullable();

            $table->string('transfer_to_department')->nullable();

            $table->string('discharged_form')->nullable();

            $table->string('cause_dead')->nullable();

            $table->boolean('mother_dead')->default(0)->nullable();

            $table->string('discharged_condition')->nullable();

            $table->integer('day_stay')->nullable();

            $table->string('payment_type')->nullable();

            $table->longText('note')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
