<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book=Book::with('authors')->get();

        return response()->json([
            'status' =>'success',
            'books' => $book,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book=Book::create([
            'title'=>$request->title,
        ]);

        return response()->json([
            'status' =>'success',
            'books' => $book,
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json([
            'status' =>'success',
            'books' => $book,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update([
            'title'=>$request->title,
        ]);

        return response()->json([
            'status' =>'success',
            'books' => $book,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'status' =>'success',
            'books' => $book,
        ]);
    }
}
