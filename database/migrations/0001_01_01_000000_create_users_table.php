<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();


            $table->string('nombres', 100);
            $table->string('apellidos', 100);

            //Autenticación NO CAMBIAR
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('num_personal_itsx', 100);
            $table->string('curp', 18);
            $table->string('rfc', 13);

            // 5. Datos Bancarios
            $table->string('num_tarjeta', 16)->nullable();
            $table->string('clabe_interbancaria', 18)->nullable();

            // 6. Estado y Auditoría
            $table->boolean('activo')->default(true);

            // 7. Relación con Roles
            // Asegúrate de que la migración de 'roles' se corra ANTES que esta, o fallará.
            // Si da error, puedes quitar el 'constrained' temporalmente o cambiar el orden de los archivos por fecha.

            $table->timestamps(); // created_at y updated_at
        });

        // Tablas auxiliares de Laravel para "Olvidé mi contraseña" y sesiones
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
