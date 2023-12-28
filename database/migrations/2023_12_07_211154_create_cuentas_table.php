<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tipo_cuenta_id')->unsigned();
            $table->string('code')->unique();
            $table->string('name');
            $table->decimal('saldo',10,2)->default(0);
            $table->string('descriptions')->nullable();
            $table->foreign('tipo_cuenta_id')->references('id')->on('tipocuentas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
