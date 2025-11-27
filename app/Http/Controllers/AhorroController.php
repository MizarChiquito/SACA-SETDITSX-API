<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ahorro; // Asegúrate de crear este modelo
use Illuminate\Support\Facades\DB;

class AhorroController extends Controller
{
    /**
     * POST /api/ahorro/solicitar
     * Crea una nueva solicitud de ahorro/aportación para el usuario autenticado.
     */
    public function solicitar(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:1',
            'tipo' => 'required|in:aportacion,retiro', // Ejemplo de tipos de movimiento
            'referencia' => 'nullable|string|max:255'
        ]);

        $user = $request->user();

        // Lógica de validación de saldo para 'retiro' iría aquí
        if ($request->tipo === 'retiro') {
            // ... verificar saldo disponible ...
        }

        // Crear el registro de la solicitud/movimiento de ahorro
        $ahorro = Ahorro::create([
            'user_id' => $user->id,
            'monto' => $request->monto,
            'tipo_movimiento' => $request->tipo,
            'estado' => 'Pendiente', // Inicialmente Pendiente de aprobación/ejecución
            'referencia' => $request->referencia,
        ]);

        return response()->json([
            'message' => 'Solicitud de ahorro enviada y pendiente de procesamiento.',
            'data' => $ahorro
        ], 201);
    }

    /**
     * GET /api/ahorro/saldo
     * Calcula y devuelve el saldo actual del usuario autenticado.
     */
    public function consultarSaldo(Request $request)
    {
        $userId = $request->user()->id;

        // Lógica de cálculo de saldo: Sumar aportaciones, restar retiros.
        $saldo = DB::table('ahorros')
            ->where('user_id', $userId)
            ->where('estado', 'Completado') // Solo movimientos completos
            ->select(
                DB::raw('SUM(CASE WHEN tipo_movimiento = "aportacion" THEN monto ELSE 0 END) as total_aportaciones'),
                DB::raw('SUM(CASE WHEN tipo_movimiento = "retiro" THEN monto ELSE 0 END) as total_retiros')
            )
            ->first();

        $saldoActual = $saldo->total_aportaciones - $saldo->total_retiros;

        // Puedes agregar aquí la lógica para sumar intereses si aplica.

        return response()->json([
            'saldo_actual' => $saldoActual,
            'unidad' => 'MXN'
        ]);
    }
}
