<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ahorros', function (Blueprint $table) {
            $table->id('id_ahorro'); // INT PK

            // Clave Foránea a USUARIOS (id_ahorrador)
            $table->unsignedBigInteger('id_ahorrador');
            $table->foreign('id_ahorrador')->references('id')->on('users')->onDelete('cascade');

            $table->decimal('monto_actual', 10, 2)->default(0.00);
            $table->decimal('saldo_actual', 10, 2)->default(0.00);
            $table->decimal('tasa_interes_ahorro', 10, 2)->default(0.00);
            $table->decimal('descuento_quincenal_ahorro', 10, 2)->default(0.00);
            $table->date('fecha_inicio');
            $table->string('estado', 20); // VARCHAR(20)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ahorros');
    }
};
