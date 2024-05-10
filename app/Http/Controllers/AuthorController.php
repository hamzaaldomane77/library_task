<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author=Author::all();

        return response()->json([
            'status' =>'success',
            'authors' => $author,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author=Author::create([
            'first_name'=>$request->first_name,
        ]);

        return response()->json([
            'status' =>'success',
            'authors' => $author,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return response()->json([
            'status' =>'success',
            'authors' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([
            'first_name'=>$request->first_name,
        ]);

        return response()->json([
            'status' =>'success',
            'authors' => $author,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json([
           'status' =>'success',
            'authors' => $author,
        ]);
    }
}
