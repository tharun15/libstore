<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newBook = new Book;
        $newBook->book_name = $request->book["book_name"];
        $newBook->description = $request->book["description"] ?? "sample";
        $newBook->author = $request->book["author"] ?? "sample";
        $newBook->published_year = $request->book["published_year"] ?? "2021";

        $newBook->save();

        return $newBook;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingItem = Book::find($id);

        if($existingItem) {
            $existingItem->description = is_null($request->book['description'])? "yes" : $request->book['description'];
            $existingItem->save();
            return $existingItem;
        }

        return "item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Book::find($id);

        if ($existingItem) {
            $existingItem->delete();
            return "Item successfully deleted";
        }

        return "item not found";
    }
}
