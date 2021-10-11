<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Autor;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('autor')->get();

        return response()->json($books, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $autor = Autor::whereId($request->autor_id)->first();

        if ($autor) {
            $book = Book::create($request->all());

            return response()->json([
                'code' => 201,
                'data' => $book
            ], 201);
        } else {
            return response()->json([
                'code' => 404,
                'data' => 'Autor NO encontrado'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book_with_autor = Book::with('autor')->whereId($book->id)->get();

        return response()->json($book_with_autor, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $autor = Autor::whereId($request->autor_id)->first();

        if ($autor) {
            $book->name = $request->name;
            $book->autor_id = $request->autor_id;

            $book->save();

            return response()->json([
                'code' => 202,
                'data' => $book
            ], 202);
        } else {
            return response()->json([
                'code' => 404,
                'data' => 'Autor NO encontrado'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'code' => 204,
        ], 204);
    }
}
