<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsInUserPlafonCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_plafon_calculations', function (Blueprint $table) {
            $table->string('largo')->nullable()->change();
            $table->string('ancho')->nullable()->change();
            $table->string('panel_area')->nullable()->change();
            $table->string('total_area')->nullable()->change();
            $table->string('panel_count')->nullable()->change();
            $table->string('main_tee_count')->nullable()->change();
            $table->string('cross_tee4_count')->nullable()->change();
            $table->string('cross_tee2_count')->nullable()->change();
            $table->string('angular_count')->nullable()->change();
            $table->string('suspension_count')->nullable()->change();
            $table->string('clavos_tipo_l')->nullable()->change();
            $table->string('fulminantes')->nullable()->change();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_plafon_calculations', function (Blueprint $table) {
            //
        });
    }
}
