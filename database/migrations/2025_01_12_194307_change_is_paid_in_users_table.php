<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIsPaidInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('is_paid');

            $table->timestamp('subscribed_at')->nullable()->after('subscription_id');

            $table->timestamp('subcription_expired_at')->nullable()->after('subscribed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('is_paid')->default(false)->after('subscription_id');

            $table->removeColumn('subscribed_at');

            $table->removeColumn('subcription_expired_at');
        });
    }
}
