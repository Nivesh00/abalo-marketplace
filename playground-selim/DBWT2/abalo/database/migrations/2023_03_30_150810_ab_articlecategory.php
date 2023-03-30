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
        Schema::create('ab_articlecategory', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary()->comment("primärschlüssel");
            $table->char('ab_name',80)->nullable(false)->unique()->comment("name");
            $table->char('ab_description',1000)->nullable(true)->comment("beschreibung");
            $table->unsignedTinyInteger('ab_parent')->nullable(true)->comment("Referenz auf die mögliche Elternkategorie.Artikelkategorien sind hierarchisch organisiert. Eine Kategorie kann beliebig viele Kind Kategorien haben. Eine Kategorie kann nur eine Elternkategorie besitzen NULL, falls es keine Elternkategorie gibt und es sich um eine Wurzelkategorie handelt.");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ab_articlecategory');
    }
};
