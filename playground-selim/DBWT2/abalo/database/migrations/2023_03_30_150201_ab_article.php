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
        Schema::create('ab_article', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary()->comment("primärschlüssel");
            $table->char('ab_name',80)->nullable(false)->unique()->comment("name");
            $table->integer('ab_price')->nullable(false)->comment("Preis in Cent");
            $table->char("ab_description",1000)->nullable(false)->comment("Beschreibung, die die Güte oder die Beschaffenheit näherdarstellt. Wird durch den „Ersteller“ (ab_user) gepflegt");
            $table->unsignedTinyInteger("ab_creator_id")->nullable(false)->comment("Referenz auf den/die Nutzer:in, der den Artikel erstellt hat undverkaufen möchte");
            $table->timestamp("ab_createdate")->nullable(false)->comment("Zeitpunkt der Erstellung des Artikels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_article');
    }
};
