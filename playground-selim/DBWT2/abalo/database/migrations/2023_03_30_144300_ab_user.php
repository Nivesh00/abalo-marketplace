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
        Schema::create('ab_user', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary()->comment("primärschlüssel");
            $table->char('ab_name',80)->nullable(false)->unique()->comment("name");
            $table->char('password', 200)->nullable(false)->comment("Passwort");
            $table->char('ab_mail', 200)->nullable(false)->unique()->comment("E-Mail-Adresse");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ab_user');
    }
};
