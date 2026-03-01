<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class FlaskController extends Controller
{
    public function store(Request $request){
        $user = $request->user();
        
        $response = Http::withHeaders([
            'X-User-Id' => $user->id,
        ])->post("http://127.0.0.1:5000/api/books", [
            'mipene' => 'gigante',
            'title' => $request->title,
            'isbn' => $request->isbn,
            'price' => $request ->price     
        ]);

        return $response->json();
    }

    public function index(Request $request){
        $books = Http::get("http://127.0.0.1:5000/api/books")->json();
        $authors = User::all();
        
        $authors_map = collect($authors)->keyBy("id");

        $books_with_author = [];
        foreach ($books as $book) {
            $books_with_author[] = [
                'id' => $book['id'],
                'title' => $book['title'],
                'isbn' => $book['isbn'],
                'price' => $book['price'],
                'author' => $authors_map[$book['author_id']] ?? null
            ];
        }

        return response()->json($books_with_author);
    }

    public function me_books(Request $request){
        $user = $request->user();
        $response = Http::withHeaders([
            'X-User-Id' => $user->id
        ])->get("http://127.0.0.1:5000/api/me/books", [

        ]);

        return response()->json($response->json());
    }
}
