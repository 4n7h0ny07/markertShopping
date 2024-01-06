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
        Schema::create('vendedor_ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venta_id')->unsigned();
            $table->bigInteger('empleado_id')->unsigned();
            $table->decimal('monto_venta',10,2)->nullable();
            $table->boolean('status_at')->default(true);
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor_ventas');
    }
};
