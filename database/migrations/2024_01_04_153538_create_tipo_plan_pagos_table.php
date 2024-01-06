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
        Schema::create('tipo_plan_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('nro_cuotas')->nullable();
            $table->integer('primer_vencimiento')->nullable();
            $table->integer('dias_entre_cuotas')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('status_ativo')->default(true)->nullable();
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
        Schema::dropIfExists('tipo_plan_pagos');
    }
};
