<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('remember_token')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->string('twitter_link')->after('address')->nullable();
            $table->string('fb_link')->after('twitter_link')->nullable();
            $table->string('insta_link')->after('fb_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
