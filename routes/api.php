<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Controlador para Login/Registro/Perfil
use App\Http\Controllers\AhorroController; // Controlador para Solicitudes/Saldos

/* | Rutas de la API (Endpoints) */

// --- 1. Endpoints de Usuarios (Autenticación y Perfil) ---
Route::prefix('auth')->group(function () {
// POST /api/auth/register
Route::post('register', [AuthController::class, 'register']); // Para el registro de un nuevo ahorrador

// POST /api/auth/login
Route::post('login', [AuthController::class, 'login']);       // Para iniciar sesión
});

// --- 2. Endpoints Protegidos (Requieren un token de sesión válido) ---
Route::middleware('auth:sanctum')->group(function () {

// GET /api/auth/profile
Route::get('auth/profile', [AuthController::class, 'profile']); // Para consultar el perfil del usuario logueado

// POST /api/auth/logout
Route::post('auth/logout', [AuthController::class, 'logout']); // Para cerrar sesión

// --- 3. Endpoints de Ahorro ---
Route::prefix('ahorro')->group(function () {
// POST /api/ahorro/solicitar
Route::post('solicitar', [AhorroController::class, 'solicitar']); // Enviar solicitud de ahorro (o aportación)

// GET /api/ahorro/saldo
Route::get('saldo', [AhorroController::class, 'consultarSaldo']); // Consultar saldo de ahorro del usuario
});
});
