<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// User routes
Route::post('/users', [UserController::class, 'addUser']);
Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

// Cluster status route (for monitoring)
Route::get('/cluster-status', function() {
    try {
        $nodes = DB::select('
            SELECT
                MEMBER_HOST as node,
                MEMBER_ROLE as role,
                MEMBER_STATE as state,
                MEMBER_VERSION as version
            FROM performance_schema.replication_group_members
        ');

        $currentNode = DB::select('SELECT @@hostname as node, @@read_only as readonly');

        return response()->json([
            'success' => true,
            'cluster' => $nodes,
            'connected_to' => $currentNode[0],
            'router_port' => env('DB_PORT')
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
});

// Health check
Route::get('/health', function() {
    try {
        DB::connection()->getPdo();
        return response()->json([
            'status' => 'healthy',
            'database' => 'connected',
            'timestamp' => now()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'unhealthy',
            'error' => $e->getMessage()
        ], 500);
    }
});
