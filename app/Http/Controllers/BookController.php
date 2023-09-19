<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Libro no registrado'], 404);
        }

        return response()->json($book);
    }

    public function gallery(Request $request)
    {
        $book = Book::create([
            "title" => $request['title'],
            "author" => $request['author'],
            "description" => $request['description'],
            "published_year" => $request['published_year'],

        ]);


        if ($book == null) {
            return response()->json([
                'error' => 'No se guardaron los datos'
            ], 500);
        }


        return response()->json($request->all());
    }
}
