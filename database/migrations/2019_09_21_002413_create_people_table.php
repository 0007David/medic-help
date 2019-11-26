<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ci');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->char('sexo')->nullable();
            $table->char('estado')->nullable();
            $table->integer('peopleable_id'); //el id de employee o patient
            $table->string('peopleable_type'); // it contains the class name of the parent model
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
        Schema::dropIfExists('people');
    }
}
