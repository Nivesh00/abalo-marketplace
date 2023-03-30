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
        //
        Schema::create('ab_article_has_articlecategory', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary()->comment("primärschlüssel");
            $table->unsignedTinyInteger('ab_articlecategory_id')->nullable(false)->comment("Referenz auf eine Artikelkategorie");
            $table->unsignedTinyInteger('ab_article_id')->nullable(false)->comment("Referenz auf einen Artikel");
            //$table->unique()->comment("ab_articlecategory_id, ab_article_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ab_article_has_articlecategory');
    }
};
