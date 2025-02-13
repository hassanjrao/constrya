<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserFaciasCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_facias_calculations', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('largo')->nullable();
            $table->string('ancho')->nullable();
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('c')->nullable();
            $table->string('d')->nullable();
            $table->decimal('perimetro_ml', 10, 2)->default(0);
            $table->decimal('m2', 10, 2)->default(0);
            $table->decimal('durmientes_ml', 10, 2)->default(0);
            $table->decimal('durmientes_und', 10, 2)->default(0);
            $table->decimal('parales_secciones', 10, 2)->default(0);
            $table->decimal('parales', 10, 2)->default(0);
            $table->decimal('m2_facias', 10, 2)->default(0);
            $table->decimal('planchas', 10, 2)->default(0);
            $table->decimal('masilla_galones', 10, 2)->default(0);
            $table->decimal('masilla_cubetas', 10, 2)->default(0);
            $table->decimal('tornillos_plancha', 10, 2)->default(0);
            $table->decimal('tornillo_estructura', 10, 2)->default(0);
            $table->decimal('clavos_pin', 10, 2)->default(0);
            $table->decimal('fulminantes', 10, 2)->default(0);
            $table->decimal('cinta', 10, 2)->default(0);
            $table->decimal('mano_obra_3caras', 10, 2)->default(0);
            $table->decimal('mano_obra_5caras', 10, 2)->default(0);
            $table->decimal('mano_obra_2caras', 10, 2)->default(0);



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

        Schema::dropIfExists('user_facias_calculations');
    }
}
