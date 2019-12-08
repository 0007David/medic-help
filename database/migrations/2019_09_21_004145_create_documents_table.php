<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->char('estado');
            $table->date('fecha_creacion');
            $table->text('observaciones');
            $table->string('url_archivo');
            $table->string('url_archivo_global');
            
            //Foreign Key Paciente
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients');

            //Foreign key de Service
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services');
            //Foreign Key 
            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id')->on('employees');

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
        Schema::dropIfExists('documents');
    }
}
