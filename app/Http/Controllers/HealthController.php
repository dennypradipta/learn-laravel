<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function get(Request $request)
    {
        return response()->json([
            'message' => 'API is healthy',
            'data' => json_decode('{}'),
            'error' => null
        ], 200);
    }
}
