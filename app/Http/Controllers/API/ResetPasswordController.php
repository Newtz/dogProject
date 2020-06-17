<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;


    protected function sendResetResponse(Request $request, $response)
    {
        return response(['message'=>$response]);
    }
 
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response(['error'=>$response], 422);
    }
}
