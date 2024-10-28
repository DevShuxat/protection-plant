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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);       // Mahsulotning asosiy narxi
            $table->string('currency')->default('UZS'); // Valyuta turi: UZS yoki USD
            $table->decimal('price_usd', 8, 2)->nullable(); // AQSH dollarida narx
            $table->string('unit')->default('kg'); // O‘lchov birligi: kg, dona, pachka
            $table->integer('stock')->default(0);
            $table->foreignId('category_id')->constrained();
            $table->string('main_image')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
