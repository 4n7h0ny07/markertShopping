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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('almacen_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('marca_id')->unsigned();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('names');
            $table->string('model');
            $table->string('price')->nullable();
            $table->string('imei')->nullable();
            $table->string('mac')->nullable();
            $table->string('description')->nullable();
            $table->foreign('almacen_id')->references('id')->on('almacens');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
