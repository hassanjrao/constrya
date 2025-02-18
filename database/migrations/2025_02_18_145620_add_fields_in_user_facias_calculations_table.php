<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInUserFaciasCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_facias_calculations', function (Blueprint $table) {

            $table->string('profiles')->nullable()->after('m2_facias');
            $table->string('acabado')->nullable()->after('profiles');
            $table->string('tipo_plancha')->nullable()->after('acabado');
            $table->string('tipo_cinta')->nullable()->after('tipo_plancha');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_facias_calculations', function (Blueprint $table) {
            //
        });
    }
}
