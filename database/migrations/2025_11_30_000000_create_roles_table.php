<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol'); // INT PK
            $table->string('nombre_rol', 50)->unique(); // VARCHAR(50), UNIQUE
            $table->text('descripcion')->nullable(); // TEXT
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
