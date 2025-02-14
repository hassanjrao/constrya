<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlatRoofCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flat_roof_calculations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('largo', 10, 2)->default(0);
            $table->decimal('ancho', 10, 2)->default(0);
            $table->decimal('mano_precio', 10, 2)->default(0);
            $table->string('perfiles')->nullable();
            $table->string('acabado')->nullable();
            $table->string('tipo_plancha')->nullable();
            $table->string('tipo_cinta')->nullable();
            $table->decimal('perimetro_ml', 10, 2)->default(0);
            $table->decimal('m2', 10, 2)->default(0);

            $table->decimal('durmientes_ml', 10, 2)->default(0);
            $table->decimal('durmientes_und', 10, 2)->default(0);

            $table->decimal('parales_ancho', 10, 2)->default(0);
            $table->decimal('parales_largo', 10, 2)->default(0);
            $table->decimal('parales_und_largo', 10, 2)->default(0);
            $table->decimal('parales', 10, 2)->default(0);

            $table->decimal('esquineros_ml', 10, 2)->default(0);
            $table->decimal('esquineros', 10, 2)->default(0);
            $table->decimal('esquineros_mas', 10, 2)->default(0);

            $table->decimal('planchas_m2', 10, 2)->default(0);
            $table->decimal('planchas', 10, 2)->default(0);

            $table->decimal('mano_obra', 10, 2)->default(0);

            $table->decimal('masilla_galones', 10, 2)->default(0);
            $table->decimal('masilla_cubetas', 10, 2)->default(0);

            $table->decimal('tornillos_plancha', 10, 2)->default(0);
            $table->decimal('tornillo_estructura', 10, 2)->default(0);

            $table->decimal('clavos_pin', 10, 2)->default(0);
            $table->decimal('fulminantes', 10, 2)->default(0);
            $table->decimal('cinta', 10, 2)->default(0);


            $table->softDeletes();


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
        Schema::dropIfExists('user_flat_roof_calculations');
    }
}
