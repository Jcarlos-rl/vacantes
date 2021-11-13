<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('folio');
            $table->string('descripcion');
            $table->boolean('acta')->default(0);
            $table->boolean('ine')->default(0);
            $table->boolean('cv')->default(0);
            $table->boolean('ced_prof')->default(0);
            $table->boolean('ced_esp')->default(0);
            $table->boolean('doc_migr')->default(0);
            $table->boolean('cert_med')->default(0);
            $table->boolean('cert_prep')->default(0);
            $table->boolean('cert_prep_tec')->default(0);
            $table->boolean('curp')->default(0);
            $table->boolean('licencia_manejo')->default(0);
            $table->boolean('comprobante_domicilio')->default(0);
            $table->boolean('disponible')->default(1);
            $table->boolean('eliminado')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('vacancies');
    }
}
