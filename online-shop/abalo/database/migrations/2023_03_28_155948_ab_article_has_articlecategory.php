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
        Schema::create('ab_article_has_articlecategory', function(Blueprint $table){

            $table->id()->comment('Primärschlüssel');

            $table->unsignedbigInteger('ab_articlecategory_id')
                ->comment('Referenz auf eine Artikelkategorie');
            $table->foreign('ab_articlecategory_id')->on('ab_articlecategory')
                ->references('id')->onDelete('cascade');

            $table->unsignedbigInteger('ab_article_id')->comment('Referenz auf einen Artikel');
            $table->foreign('ab_article_id')->on('ab_article')->references('id')
                ->onDelete('cascade');


    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('ab_article_has_articlecategory', function (Blueprint $table)
        {
            $table->dropForeign(['ab_articlecategory_id']);
            $table->dropForeign(['ab_article_id']);
        });
        Schema::dropIfExists('ab_article_has_articlecategory ');
    }
};
