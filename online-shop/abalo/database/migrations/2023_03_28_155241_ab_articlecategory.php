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

        Schema::create('ab_articlecategory', function (Blueprint $table){

            $table->id()->comment('Primärschlüssel');

            $table->string('ab_name', 100)->unique()->comment('Name');

            $table->string('ab_description', 1000)->comment('Beschreibung')->nullable();

            $table->unsignedbigInteger('ab_parent')->comment('Referenz auf die mögliche Elternkategorie.
                        Artikelkategorien sind hierarchisch organisiert. Eine Kategorie
                        kann beliebig viele Kind Kategorien haben. Eine Kategorie kann
                        nur eine Elternkategorie besitzen.
                        NULL, falls es keine Elternkategorie gibt und es sich um eine
                        Wurzelkategorie handelt.')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ab_article_has_articlecategory');
        Schema::dropIfExists('ab_articlecategory');
    }
};
