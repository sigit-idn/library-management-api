<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    function get() {
        return response()->json([
            "message" => "Books Loaded",
            "data" => Book::all()
        ]);
    }

    function getOne($id) {
        return response()->json([
            "message" => "Get book successfully",
            "data" => Book::find($id)
        ]);
    }
    function post(Request $request) {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->stock = $request->stock;
        $book->save();

        return response()->json([
            "message" => "Book Submitted",
            "data" => $book
        ]);
    }

    function put(Request $request, $id) {
        $book = Book::find($id);
        $book->title = $request->title ? $request->title : $book->title;
        $book->author = $request->author ? $request->author : $book->author;
        $book->publisher = $request->publisher ? $request->publisher : $book->publisher;
        $book->year = $request->year ? $request->year : $book->year;
        $book->stock = $request->stock ? $request->stock : $book->stock;
        $book->save();

        return response()->json([
            "message" => "Data updated successfully",
            "data" => $book
        ]);
    }
    
    function delete($id) {
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            "message" => "Data deleted successfully",
            "data" => $book
        ]);
    }
}
