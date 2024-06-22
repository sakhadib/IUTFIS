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
        Schema::table('members', function (Blueprint $table) {
            $table->string('facebook_link')->nullable()->change();
            $table->string('linkedin_link')->nullable()->change();
            $table->string('instagram_link')->nullable()->change();
            $table->string('portfolio_link')->nullable()->change();
            $table->text('bio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('facebook_link')->nullable(false)->change();
            $table->string('linkedin_link')->nullable(false)->change();
            $table->string('instagram_link')->nullable(false)->change();
            $table->string('portfolio_link')->nullable(false)->change();
            $table->text('bio')->nullable(false)->change();
        });
    }
};
