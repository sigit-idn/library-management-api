<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    function get() {
			return response()->json([
				"message" => "Get borrows data successfully",
				"data"		=> Borrow::all()
			]);
		}

    function getOne($id) {
			$borrow = Borrow::find($id);

			return response()->json([
				"message" => "Get borrow data successfully",
				"data"		=> [
					"book" 		=> $borrow->book,
					"admin" 	=> $borrow->admin,
					"user" 		=> $borrow->user
					]
			]);
		}

		function post(Request $request) {
			$borrow = new Borrow();
			$borrow->admin_id = $request->admin_id;
			$borrow->user_id = $request->user_id;
			$borrow->book_id = $request->book_id;
			$borrow->borrow_date = $request->borrow_date;
			$borrow->save();

			$book = $borrow->book;
			$user = $borrow->user;
			$admin = $borrow->admin;

			$book->stock --;
			$book->save();

			
			return response()->json([
				"message" => "Borrow process successfuly",
				"data" 		=> $borrow, $book, $user, $admin
			]);
		}
		
		function put(Request $request, $id) {
			$borrow = Borrow::find($id);
			$borrow->admin_id = $request->admin_id ? $request->admin_id : $borrow->admin_id;
			$borrow->user_id = $request->user_id ? $request->user_id : $borrow->user_id;
			$borrow->book_id = $request->book_id ? $request->book_id : $borrow->book_id;
			$borrow->borrow_date = $request->borrow_date ? $request->borrow_date : $borrow->borrow_date;
			$borrow->save();

			$book = Book::find($request->book_id);

			return response()->json(([
				"message" => "Borrow process successfuly",
				"data" 		=> $borrow, $book
			]));
		}

		function delete(Request $request, $id) {
			$borrow = Borrow::find($id);
			$book = Book::find($borrow->book_id);
			$user = User::find($borrow->user_id);
			$admin = Admin::find($borrow->admin_id);
			$borrow->delete();

			response()->json([
				"message" => "Delete borrow successfuly",
				"data" => $borrow, $book, $user, $admin
			]);
		}
};
