<?php

namespace App\Http\Controllers;

use App\Models\Returns;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    function get() {
        return response()->json([
            "message"   => "Get return data successfully",
            "data"	    => Returns::all()
        ]);
    }

    function post(Request $request) {
        $return = new Returns();
        $return->admin_id = $request->admin_id;
        $return->user_id = $request->user_id;
        $return->book_id = $request->book_id;
        $return->borrow_id = $request->borrow_id;
        $return->return_date = $request->return_date;
        
        $borrow = Borrow::find($return->borrow_id);
        // $borrow = $return->borrow;
        $borrow->softDelete();
        
        $return->borrow_date = $borrow->borrow_date;
        $return->save();

        $book = $borrow->book;
        $book->stock++;
        $book->save();

        $user = $borrow->user;
        $admin = $borrow->admin;
        
        return response()->json(([
            "message"   => "Return process successfuly",
            "data" 		=> $return, $borrow, $book
            // "data" 		=> $return, $book, $user, $admin, $borrow
        ]));
    }
    
    function put(Request $request, $id) {
        $return = Returns::find($id);
        $return->admin_id = $request->admin_id ? $request->admin_id : $return->admin_id;
        $return->user_id = $request->user_id ? $request->user_id : $return->user_id;
        $return->book_id = $request->book_id ? $request->book_id : $return->book_id;
        $return->borrow_date = $request->borrow_date ? $request->borrow_date : $return->borrow_date;
        $return->save();

        $book = Book::find($request->book_id);

        return response()->json(([
            "message" => "Return process successfuly",
            "data" 		=> $return, $book
        ]));
    }

    function delete(Request $request, $id) {
        $return = Returns::find($id);
        $book = Book::find($return->book_id);
        $user = User::find($return->user_id);
        $admin = Admin::find($return->admin_id);
        $borrow = Borrow::find($return->borrow_id);
        $return->delete();

        response()->json([
            "message" => "Delete return successfuly",
            "data" => $return, $book, $user, $admin, $borrow
        ]);
    }
}
