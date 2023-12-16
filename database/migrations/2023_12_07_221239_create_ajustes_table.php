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
        Schema::create('ajustes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cuenta_id')->unsigned();
            $table->string('number')->unique();
            $table->date('fecha');
            $table->decimal('monto',10,2);
            $table->text('descriptions');
            $table->string('tipoajuste');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajustes');
    }
};
