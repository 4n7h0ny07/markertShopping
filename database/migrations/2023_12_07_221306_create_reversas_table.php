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
        Schema::create('reversas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaccion_id')->unsigned();
            $table->string('number')->unique();
            $table->date('fecha');
            $table->text('descripcion');
            $table->foreign('transaccion_id')->references('id')->on('transaccions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reversas');
    }
};
