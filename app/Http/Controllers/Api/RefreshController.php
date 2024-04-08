<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefreshController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $token = Auth::refresh();
        // $user = Auth::refresh();
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token,
        ], 200);

    }
}
