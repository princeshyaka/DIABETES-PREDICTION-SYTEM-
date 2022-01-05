<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('pregnancies');
            $table->integer('glucose');
            $table->integer('bloodPressure');
            $table->integer('skinThickness');
            $table->integer('insulin');
            $table->decimal('BMI', 2, 2);
            $table->decimal('diabetesPedigreeFunction', 2, 2);
            $table->integer('age');
            $table->boolean('outcome');
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
