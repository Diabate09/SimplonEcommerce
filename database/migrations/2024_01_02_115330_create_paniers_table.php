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
            Schema::create('cart', function (Blueprint $table) {
                $table->id();

                // Clé étrangère liée à la table de produits
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');

                // Clé étrangère liée à la table de commandes (peut être nulle au début)
                $table->unsignedBigInteger('commande_id')->nullable();
                $table->foreign('commande_id')->references('id')->on('commandes');

                $table->integer('quantity');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
