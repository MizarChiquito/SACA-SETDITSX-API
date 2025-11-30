<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario'); // INT PK
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('correo', 100)->unique(); // UNIQUE
            $table->string('contrasena_hash', 255);

            // Campos opcionales del ERD
            $table->string('Num_Personal_ITSX', 100)->nullable();
            $table->string('CURP', 18)->nullable();
            $table->string('RFC', 13)->nullable();
            $table->string('Num_Tarjeta', 16)->nullable();
            $table->string('CLABE_Interbancaria', 18)->nullable();

            $table->date('fecha_registro');
            $table->boolean('activo')->default(true);

            // Clave Foránea a ROLES
            // Nota: Se debe especificar 'id_rol' como columna en la tabla 'roles'
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
