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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->bigInteger('cuenta_id')->unsigned();
            $table->bigInteger('tipo_plan_pagos_id')->unsigned();
            $table->bigInteger('price_list_id')->unsigned();
            $table->decimal('inicial',10,2)->nullable();
            $table->decimal('saldo',10,2)->nullable();
            $table->decimal('total',10,2)->nullable();
            $table->decimal('iva',10,2)->nullable();
            $table->string('typepayment')->default('contado')->nullable();
            $table->boolean('status_at')->default(true);
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->foreign('tipo_plan_pagos_id')->references('id')->on('tipo_plan_pagos');
            $table->foreign('price_list_id')->references('id')->on('pricelists');
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
        Schema::dropIfExists('ventas');
    }
};
