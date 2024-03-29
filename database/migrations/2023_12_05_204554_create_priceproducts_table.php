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
        Schema::create('priceproducts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id')->unsigned();
            $table->bigInteger('pricelists_id')->unsigned();
            $table->string('price_normal')->nullable();
            $table->string('price_promotion')->nullable();
            $table->string('increment_precing')->nullable();
            $table->string('decrement_precing')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('products_id')->references('id')->on('productos');
            $table->foreign('pricelists_id')->references('id')->on('pricelists');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priceproducts');
    }
};
