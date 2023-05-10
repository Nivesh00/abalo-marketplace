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
        Schema::create('ab_shoppingcart', function (Blueprint $table)
        {
            $table->id()->comment('Primärschlüssel');

            $table->bigInteger('ab_creator_id')->nullable(false)->comment('Referenz auf den/die Benutzer:in, dem der Warenkorb gehört');
            $table->foreign('ab_creator_id')->on('ab_user')->references('id')->onDelete('cascade');

            $table->timestamp('ab_createdate')->nullable(false)->comment('Zeitpunkt der Erstellung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('ab_shoppingcart', function (Blueprint $table)
        {
           $table->dropForeign(['ab_creator_id']);
        });
        Schema::dropIfExists('ab_shoppingcart');
    }
};
