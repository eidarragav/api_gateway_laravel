<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DjangoController extends Controller
{
    public function guardar_recetas(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Token miclave123',
        ])->post(env("API_DJANGO"),[
            "nombre" => $request->nombre,
            "precio" => $request->precio,
            "descripcion" => $request->descripcion,            
        ]);

        return [
            'status' => $response->status(),
            'body' => $response->body()
        ];        
    }
}
