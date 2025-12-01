<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago'); // INT PK

            // FK: Préstamo al que se aplica el pago
            $table->unsignedBigInteger('id_prestamo');
            $table->foreign('id_prestamo')->references('id_prestamo')->on('prestamos')->onDelete('cascade');

            $table->decimal('monto_pago', 10, 2);
            $table->decimal('monto_capital', 10, 2);
            $table->decimal('monto_interes', 10, 2);
            $table->date('fecha_pago');
            $table->string('tipo_movimiento', 20); // VARCHAR(20)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
