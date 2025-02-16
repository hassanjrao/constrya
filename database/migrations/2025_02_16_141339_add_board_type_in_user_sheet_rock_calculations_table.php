<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBoardTypeInUserSheetRockCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_sheet_rock_calculations', function (Blueprint $table) {

            $table->string('board_type')->nullable()->after('finish');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_sheet_rock_calculations', function (Blueprint $table) {

            $table->dropColumn('board_type');
        });
    }
}
