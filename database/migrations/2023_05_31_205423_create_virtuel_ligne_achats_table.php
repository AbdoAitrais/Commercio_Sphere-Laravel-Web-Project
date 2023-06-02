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
        Schema::create('virtuel_ligne_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('virtuel_article_id')->constrained('virtuel_articles');
            $table->foreignId('demande_achat_id')->constrained('demande_achats');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtuelligneachats');
    }
};
