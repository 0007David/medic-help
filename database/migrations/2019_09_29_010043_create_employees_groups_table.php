<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id')->on('employees');
            $table->unsignedBigInteger('id_group');
            $table->foreign('id_group')->references('id')->on('groups');
            $table->boolean('descargar');
            $table->boolean('lectura');
            $table->boolean('eliminar');
            $table->string('rolGrupo');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_groups');
    }
}
