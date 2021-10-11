<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autors = Autor::with('books')->get();

        return response()->json($autors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorRequest $request)
    {
        $autor = Autor::create($request->all());

        return response()->json([
            'code' => 201,
            'data' => $autor
        ], 201);

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        $autor_with_book = Autor::with('books')->whereId($autor->id)->get();

        return response()->json($autor_with_book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(AutorRequest $request, Autor $autor)
    {
        $autor->name = $request->name;
        $autor->save();

        return response()->json([
            'code' => 202,
            'data' => $autor,
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return response()->json([
            'code' => 204,
        ], 204);
    }
}
