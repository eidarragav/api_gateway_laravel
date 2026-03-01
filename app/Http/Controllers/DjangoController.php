<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DjangoController extends Controller
{
    public function recetas(Request $request){
        $response = Http::get("endpoint");
        //hacer .env
        return response()->json($response);
    }
}
