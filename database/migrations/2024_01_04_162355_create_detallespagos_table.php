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
        Schema::create('detallespagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_pago_id')->unsigned();
            $table->timestamp('pago_fecha')->nullable();
            $table->decimal('monto_capital',10,2)->nullable();
            $table->decimal('interes',10,2)->nullable();
            $table->decimal('sub_total',10,2)->nullable();
            $table->integer('dias_vencidos')->nullable();
            $table->boolean('status_at')->default(true);
            $table->foreign('plan_pago_id')->references('id')->on('planpagos');
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
        Schema::dropIfExists('detallespagos');
    }
};
