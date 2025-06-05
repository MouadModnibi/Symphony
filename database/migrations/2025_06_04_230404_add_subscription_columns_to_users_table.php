<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // database/migrations/xxxx_xx_xx_xxxxxx_add_subscription_columns_to_users_table.php
Schema::table('users', function (Blueprint $table) {
    $table->string('plan')->nullable()->after('password');
    $table->timestamp('trial_ends_at')->nullable();
    $table->timestamp('subscription_ends_at')->nullable();
    $table->boolean('is_premium')->default(false);
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
            //
        });
    }
};
