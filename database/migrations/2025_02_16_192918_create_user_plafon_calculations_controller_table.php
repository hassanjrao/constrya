<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlafonCalculationsControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plafon_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('largo', 10, 2);
            $table->decimal('ancho', 10, 2);
            $table->string('unidad');
            $table->string('panel_size');
            $table->decimal('panel_area', 10, 2);
            $table->decimal('total_area', 10, 2);
            $table->decimal('panel_count', 10, 2);
            $table->decimal('main_tee_count', 10, 2);
            $table->decimal('cross_tee4_count', 10, 2);
            $table->decimal('cross_tee2_count', 10, 2);
            $table->decimal('angular_count', 10, 2);
            $table->decimal('suspension_count', 10, 2);
            $table->decimal('clavos_tipo_l', 10, 2);
            $table->decimal('fulminantes', 10, 2);

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
        Schema::dropIfExists('user_plafon_calculations');
    }
}
