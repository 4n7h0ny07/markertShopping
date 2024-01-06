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
        Schema::create('ventasdetalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venta_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            //$table->bigInteger('price_list_id')->unsigned();
            $table->decimal('cantidad',10,2)->nullable();
            $table->decimal('monto',10,2)->nullable();
            $table->decimal('descuento',10,2)->nullable();
            $table->decimal('subtotal', 10,2)->nullable();
            $table->boolean('status_at')->default(false);
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('producto_id')->references('id')->on('productos');
            //$table->foreign('price_list_id')->references('id')->on('pricelists');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventasdetalles');
    }
};
