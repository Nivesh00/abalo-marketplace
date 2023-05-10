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
        Schema::create('ab_shoppingcart_item', function (Blueprint $table)
        {
            $table->id()->comment('Primärschlüssel');

            $table->bigInteger('ab_shoppingcart_id')->nullable(false)->comment('Referenz auf den Warenkorb');
            $table->foreign('ab_shoppingcart_id')->references('id')->on('ab_shoppingcart')
                ->onDelete('cascade');

            $table->bigInteger('ab_article_id')->nullable(false)->comment('Referenz auf den Artikel');
            $table->foreign('ab_article_id')->on('ab_article')->references('id')->onDelete('cascade');

            $table->timestamp('ab_createdate')->nullable(false)->comment('Zeitpunkt der Erstellung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('ab_shoppingcart_item', function (Blueprint $table)
        {
            $table->dropForeign(['ab_shoppingcart_id']);
            $table->dropForeign(['ab_article_id']);
        });
        Schema::dropIfExists('ab_shoppingcart_item');
    }
};
