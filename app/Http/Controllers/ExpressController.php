<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExpressController extends Controller
{
    public function users_firebase(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => "Token miclave123"
        ])->post(env("API_EXPRESS"), [
            "name" => $request->name,
            "email" => $request->email
        ]);

        return[
            'status' => $response->status(),
            'body' => $response->body()
        ];
    }
}
