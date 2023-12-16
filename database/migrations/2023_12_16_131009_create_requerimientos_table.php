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
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->string('number')->unique();
            $table->decimal('monto',10,2)->nullable();
            $table->decimal('adelanto',10,2)->nullable();
            $table->decimal('saldo',10,2)->nullable();
            $table->text('descriptions');
            $table->string('tipo_requerimiento')->nullable();
            $table->string('documento')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
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
        Schema::dropIfExists('requerimientos');
    }
};
