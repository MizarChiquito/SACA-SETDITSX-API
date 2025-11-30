<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamo'); // INT PK

            // FK: Ahorrador que solicita
            $table->unsignedBigInteger('id_ahorrador_solicita');
            $table->foreign('id_ahorrador_solicita')->references('id_usuario')->on('usuarios')->onDelete('cascade');

            // FK: Administrador que aprueba (puede ser NULL)
            $table->unsignedBigInteger('id_administrador_aprueba')->nullable();
            $table->foreign('id_administrador_aprueba')->references('id_usuario')->on('usuarios')->onDelete('set null');

            $table->decimal('monto_solicitado', 10, 2);
            $table->decimal('monto_aprobado', 10, 2)->nullable();
            $table->decimal('saldo_pendiente', 10, 2)->nullable();
            $table->decimal('tasa_interes_prestamo', 5, 4)->nullable(); // DECIMAL(5,4)
            $table->integer('plazo_quincenas')->nullable();
            $table->decimal('descuento_quincenal_prestamo', 10, 2)->nullable();
            $table->date('fecha_solicitud');
            $table->date('fecha_desembolso')->nullable();
            $table->string('estado', 20); // VARCHAR(20)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
