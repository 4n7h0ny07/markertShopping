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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->bigInteger('cuenta_id')->unsigned();
            $table->string('number')->unique();
            $table->string('code_number')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();;
            $table->string('serialNumber')->nullable();
            $table->text('descriptions')->nullable();
            $table->decimal('costo',10,2)->nullable();
            $table->decimal('vida_util',10,2)->nullable();
            $table->text('observaciones')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
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
        Schema::dropIfExists('activos');
    }
};
