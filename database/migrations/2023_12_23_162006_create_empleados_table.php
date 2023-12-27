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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->integer('number')->unique();
            $table->string('code_number')->unique()->nullable();
            $table->string('area')->nullable();
            $table->string('cargo')->nullable();
            $table->string('sucursal')->nullable();;
            $table->integer('win')->nullable();
            $table->decimal('salario',10,2)->nullable();
            $table->decimal('incremento',10,2)->nullable();
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
        Schema::dropIfExists('empleados');
    }
};
