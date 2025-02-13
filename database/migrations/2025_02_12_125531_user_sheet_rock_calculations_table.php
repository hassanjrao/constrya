<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSheetRockCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sheet_rock_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('metros_lineares', 10, 2)->default(0);
            $table->decimal('height', 10, 2)->default(0);
            $table->decimal('sides', 10, 2)->default(0);
            $table->string('profile')->nullable();
            $table->string('finish')->nullable();
            $table->string('tape')->nullable();
            $table->decimal('doors', 10, 2)->default(0);
            $table->decimal('corners', 10, 2)->default(0);
            $table->string('corner_pieces')->nullable();
            $table->string('interior_exterior')->nullable();

            $table->decimal('product', 10, 2)->default(0);
            $table->decimal('m2box', 10, 2)->default(0);
            $table->decimal('sleepers', 10, 2)->default(0);
            $table->decimal('studs', 10, 2)->default(0);
            $table->decimal('structural_screws', 10, 2)->default(0);
            $table->decimal('nails', 10, 2)->default(0);
            $table->decimal('tapes', 10, 2)->default(0);
            $table->decimal('screws', 10, 2)->default(0);
            $table->decimal('putty', 10, 2)->default(0);
            $table->decimal('corner_beads', 10, 2)->default(0);
            $table->decimal('wood_reinforcement', 10, 2)->default(0);
            $table->decimal('panels', 10, 2)->default(0);
            $table->decimal('fasteners', 10, 2)->default(0);
            $table->decimal('cement', 10, 2)->default(0);


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
        Schema::dropIfExists('user_sheet_rock_calculations');
    }
}
