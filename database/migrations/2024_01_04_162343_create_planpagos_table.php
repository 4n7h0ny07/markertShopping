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
        Schema::create('planpagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venta_id')->unsigned();
            $table->timestamp('fecha_vence')->nullable();
            $table->integer('dias')->nullable();
            $table->decimal('saldo_capital',10,2)->nullable();
            $table->decimal('amortizacion_capital',10,2)->nullable();
            $table->decimal('interes',10,2)->nullable();
            $table->decimal('total',10,2)->nullable();
            $table->boolean('status_at')->default(false);
            $table->foreign('venta_id')->references('id')->on('ventas');
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
        Schema::dropIfExists('planpagos');
    }
};
